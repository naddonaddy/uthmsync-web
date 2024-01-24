<?php
session_start(); // Start the session

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $database = new Database('localhost', 'root', '', 'uthmsync');
  $db_connection = $database->connect();

  $usernameOrEmail = mysqli_real_escape_string($db_connection, $_POST['username']);
  $password = mysqli_real_escape_string($db_connection, $_POST['password']);

  // Check in the staff table
  $staffQuery = "SELECT * FROM staff WHERE (username = '$usernameOrEmail' OR email = '$usernameOrEmail')";
  $staffResult = mysqli_query($db_connection, $staffQuery);

  // Check in the student table if not found in the staff table
  if (mysqli_num_rows($staffResult) == 0) {
    $studentQuery = "SELECT * FROM student WHERE (username = '$usernameOrEmail' OR email = '$usernameOrEmail')";
    $studentResult = mysqli_query($db_connection, $studentQuery);

    if (mysqli_num_rows($studentResult) > 0) {
      // Student found
      $user = mysqli_fetch_assoc($studentResult);
      if (password_verify($password, $user['password'])) {
        // Password is correct, perform login actions

        // Store user information in session variables
        $_SESSION['user_role'] = 'student';
        $_SESSION['user_id'] = $user['studentID']; // Updated this line

        // Regenerate the session ID
        session_regenerate_id(true);

        // Redirect to student dashboard or perform other actions
        header("Location: dashboard-student.php");
        exit(); // Ensure the script stops here to prevent further execution
      } else {
        echo '<script>alert("Invalid username or password for student");</script>';
      }
    } else {
      echo '<script>alert("User not found");</script>';
    }
  } else {
    // Staff found
    $user = mysqli_fetch_assoc($staffResult);
    if (password_verify($password, $user['password'])) {
      // Password is correct, perform login actions

      // Store user information in session variables
      $_SESSION['user_role'] = 'staff';
      $_SESSION['user_id'] = $user['staffID']; // Updated this line

      // Regenerate the session ID
      session_regenerate_id(true);

      // Redirect to staff dashboard or perform other actions
      header("Location: dashboard-staff.php"); // Corrected redirection
      exit(); // Ensure the script stops here to prevent further execution
    } else {
      echo '<script>alert("Invalid username or password for staff");</script>';
    }
  }

  $database->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UTHMSync</title>
  <link rel="stylesheet" href="style-user/style-user.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
  <div class="login-container">
    <h1>Login</h1>
    <form class="login-form" action="#" method="POST">
      <div class="login-input-group">
        <input type="text" id="username" name="username" placeholder="Email or Username" required>
      </div>
      <div class="login-input-group">
        <input type="password" id="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="login-button">Login</button>
    </form>
    <div class="register">
      <p>Don't have an account?</p>
      <a href="role.php" class="register-button">Register</a>
    </div>
  </div>
</body>

</html>