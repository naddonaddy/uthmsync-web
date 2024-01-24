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
        <h2>Staff Registration</h2>
        <div class="staff-registration-container-a">
            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="hidden" name="role" value="Staff" readonly>

                <label for="staffFullName">Full Name:</label>
                <input type="text" id="staffFullName" name="staffFullName" required>

                <label for="staffID">Staff ID:</label>
                <input type="text" id="staffID" name="staffID" required onkeyup="fillUsername()">

                <label for="staffIDUpload">Upload Staff ID:</label>
                <input type="file" id="staffIDUpload" name="staffIDImage" accept="image/*">

                <label for="staffPhoneNumber">Phone Number:</label>
                <input type="tel" id="staffPhoneNumber" name="staffPhoneNumber" required>

                <label for="staffEmail">Email:</label>
                <input type="email" id="staffEmail" name="staffEmail" required>

                <label for="staffUsername">Username:</label>
                <input type="text" id="staffUsername" name="staffUsername" required readonly>
                <!-- Hidden input field to store staffUsername -->
                <input type="hidden" id="hiddenStaffUsername" name="hiddenStaffUsername">

                <label for="staffPassword">Password:</label>
                <input type="password" id="staffPassword" name="staffPassword" required>

                <label for="staffPTj">PTj:</label>
                <select id="staffPTj" name="staffPTj" required>
                    <option value="">Select PTj</option>
                    <option value="ptj2">PTj 2</option>
                    <!-- Add more PTj options as needed -->
                </select><br><br>

                <input type="submit" value="Submit">
            </form>

            <script>
                document.getElementById('staffFullName').addEventListener('input', function (event) {
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
                    const staffID = document.getElementById('staffID').value;
                    const username = document.getElementById('staffUsername');
                    const hiddenUsername = document.getElementById('hiddenStaffUsername');

                    username.value = staffID;
                    hiddenUsername.value = staffID;  // Set the value of the hidden input
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

        $fullName = mysqli_real_escape_string($db_connection, $_POST['staffFullName']);
        $staffID = mysqli_real_escape_string($db_connection, $_POST['staffID']);
        $phoneNumber = mysqli_real_escape_string($db_connection, $_POST['staffPhoneNumber']);
        $email = mysqli_real_escape_string($db_connection, $_POST['staffEmail']);
        $password = mysqli_real_escape_string($db_connection, $_POST['staffPassword']);
        $username = mysqli_real_escape_string($db_connection, $_POST['hiddenStaffUsername']);
        $ptj = mysqli_real_escape_string($db_connection, $_POST['staffPTj']);

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Process staffIDImage (file upload)
        $staffIDImage = '';  // Initialize variable
    
        if (isset($_FILES['staffIDImage'])) {
            $file_name = $_FILES['staffIDImage']['name'];
            $file_size = $_FILES['staffIDImage']['size'];
            $file_tmp = $_FILES['staffIDImage']['tmp_name'];
            $file_type = $_FILES['staffIDImage']['type'];

            // Upload directory (make sure this directory exists and has the correct permissions)
            $upload_dir = "uploads/";
            move_uploaded_file($file_tmp, $upload_dir . $file_name);
            $staffIDImage = $upload_dir . $file_name;
        }

        // Check if staffID or username already exist in the database
        $checkQuery = "SELECT * FROM staff WHERE staffID = '$staffID' OR username = '$username' OR email = '$email'";
        $checkResult = mysqli_query($db_connection, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<script>showErrorMessage();</script>";
        } else {
            $insertQuery = "INSERT INTO staff (fullName, staffID, role, phoneNumber, email, password, username, ptj, staffIDImage, makeAdmin) 
            VALUES ('$fullName', '$staffID', 'Staff', '$phoneNumber', '$email', '$hashedPassword', '$username', '$ptj', '$staffIDImage', false)";

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