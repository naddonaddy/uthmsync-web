<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTHMSync</title>
    <link rel="stylesheet" href="style-user/staff-registration.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <div class="staff-registration-main-container">
        <h2>Student Registration</h2>
        <div class="staff-registration-container-a">
            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="hidden" name="role" value="Student" readonly>

                <label for="studentFullName">Full Name:</label>
                <input type="text" id="studentFullName" name="studentFullName" required>

                <label for="studentID">Student ID:</label>
                <input type="text" id="studentID" name="studentID" required onkeyup="fillUsername()">

                <label for="studentIDUpload">Upload StudentID:</label>
                <input type="file" id="studentIDUpload" name="studentIDImage" accept="image/*">

                <label for="studentPhoneNumber">Phone Number:</label>
                <input type="tel" id="studentPhoneNumber" name="studentPhoneNumber" required>

                <label for="studentEmail">Email:</label>
                <input type="email" id="studentEmail" name="studentEmail" required>

                <label for="studentUsername">Username:</label>
                <input type="text" id="studentUsername" name="studentUsername" required readonly>
                <!-- Hidden input field to store studentUsername -->
                <input type="hidden" id="hiddenStudentUsername" name="hiddenStudentUsername">

                <label for="studentPassword">Password:</label>
                <input type="password" id="studentPassword" name="studentPassword" required>

                <label for="faculty">PTj:</label>
                <select id="faculty" name="faculty" required>
                    <option value="">Select faculty</option>
                    <option value="FSKTM">FSKTM</option>
                    <option value="FKMP">FKMP</option>
                    <option value="FKAAB">FKAAB</option>
                    <option value="FPTP">FPTP</option>
                    <option value="FPTV">FPTV</option>
                    <option value="FKEE">FKEE</option>
                    <option value="FAST">FAST</option>
                    <option value="FTK">FTK</option>
                </select><br><br>

                <input type="submit" value="Submit">
            </form>

            <script>
                document.getElementById('studentFullName').addEventListener('input', function (event) {
                    // Get the input value
                    let inputValue = event.target.value;

                    // Capitalize the first letter of every word
                    let capitalizedValue = inputValue.toLowerCase().replace(/\b\w/g, function (match) {
                        return match.toUpperCase();
                    });

                    // Update the input value with the capitalized one
                    event.target.value = capitalizedValue;
                });

                function fillUsername() {
                    const studentID = document.getElementById('studentID').value;
                    const username = document.getElementById('studentUsername');
                    const hiddenUsername = document.getElementById('hiddenStudentUsername');

                    username.value = studentID;
                    hiddenUsername.value = studentID;  // Set the value of the hidden input
                    username.style.backgroundColor = '#f2f2f2';
                    username.setAttribute('readonly', true);
                    username.setAttribute('disabled', true);
                }

                function validateForm() {
                    // You can add additional validation here if needed
                    return true; // Returning true will submit the form; false will prevent submission
                }

                function showSuccessMessage() {
                    alert('Welcome to UTHMSync, you are successfully registered!');
                    window.location.href = 'login-user.php'; // Redirect to login page
                }

                function showErrorMessage() {
                    alert('User already exists. Please contact your administrator.');
                }

                window.addEventListener("beforeunload", function (e) {
                    // Check if the event target is a form element
                    if (e.target.tagName.toLowerCase() === "form") {
                        // Check if the active element is not a submit button
                        if (e.target.activeElement && e.target.activeElement.type !== "submit") {
                            var confirmationMessage = "You have unsaved changes. Are you sure you want to leave?";
                            e.returnValue = confirmationMessage; // Standard for most browsers
                            return confirmationMessage; // For some older browsers
                        } else {
                            // User clicked the submit button, no confirmation needed
                            e.returnValue = null;
                        }
                    }
                });

            </script>
        </div>
    </div>

    <?php
    include('db.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $database = new Database('localhost', 'root', '', 'uthmsync');
        $db_connection = $database->connect();

        $fullName = mysqli_real_escape_string($db_connection, $_POST['studentFullName']);
        $studentID = mysqli_real_escape_string($db_connection, $_POST['studentID']);
        $phoneNumber = mysqli_real_escape_string($db_connection, $_POST['studentPhoneNumber']);
        $email = mysqli_real_escape_string($db_connection, $_POST['studentEmail']);
        $password = mysqli_real_escape_string($db_connection, $_POST['studentPassword']);
        $username = mysqli_real_escape_string($db_connection, $_POST['hiddenStudentUsername']);
        $faculty = mysqli_real_escape_string($db_connection, $_POST['faculty']);

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Process studentIDImage (file upload)
        $studentIDImage = '';  // Initialize variable
    
        if (isset($_FILES['studentIDImage'])) {
            $file_name = $_FILES['studentIDImage']['name'];
            $file_size = $_FILES['studentIDImage']['size'];
            $file_tmp = $_FILES['studentIDImage']['tmp_name'];
            $file_type = $_FILES['studentIDImage']['type'];

            // Upload directory (make sure this directory exists and has the correct permissions)
            $upload_dir = "uploads/";
            move_uploaded_file($file_tmp, $upload_dir . $file_name);
            $studentIDImage = $upload_dir . $file_name;
        }

        // Check if studentID or username already exist in the database
        $checkQuery = "SELECT * FROM student WHERE studentID = '$studentID' OR username = '$username' OR email = '$email'";
        $checkResult = mysqli_query($db_connection, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<script>showErrorMessage();</script>";
        } else {
            $insertQuery = "INSERT INTO student (fullName, studentID, role, phoneNumber, email, password, username, faculty, studentIDImage) 
VALUES ('$fullName', '$studentID', 'Student', '$phoneNumber', '$email', '$hashedPassword', '$username', '$faculty', '$studentIDImage')";

            if (mysqli_query($db_connection, $insertQuery)) {
                echo "<script>showSuccessMessage();</script>";
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($db_connection);
            }
        }

        $database->close();
    }
    ?>
</body>

</html>