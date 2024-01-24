<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UTHMSync</title>
    <link rel="stylesheet" href="style/style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <div class="container">
        <div class="sidebar" id="sidebar">
            <button id="menu-toggle" class="navbar-toggler" type="button">
                <i class="material-icons">chevron_right</i>
            </button>
            <div class="menu">
                <div class="menu-item">
                    <a href="dashboard.php">Dashboard</a>
                </div>
                <div class="menu-item">
                    <a href="profile.php">Profile</a>
                </div>
                <div class="menu-item">
                    <a href="manage-admin.php">Manage Admin</a>
                </div>
                <div class="menu-item">
                    <a href="manage-user.php">Manage User</a>
                </div>
                <div class="menu-item">
                    <a href="user-activities-overview.php">User Activities Overview</a>
                </div>
                <div class="menu-item">
                    <a href="manage-report.php">Manage Report</a>
                </div>
                <div class="menu-item">
                    <a href="sign-out.php">Sign Out</a>
                </div>
            </div>
        </div>

        <div class="main-content" id="mainContent">
            <h2>My Profile</h2>

            <!-- Editable Avatar -->
            <div class="avatar-container">
                <!-- Add an editable avatar here -->
                <img src="user_avatar.jpg" alt="User Avatar">
                <input type="file" accept="image/*" name="avatar" id="avatarInput">
            </div>

            <!-- Profile Edit Form -->
            <form action="update_profile.php" method="post">
                <!-- Full Name (Read-Only) -->
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" value="John Doe" readonly>

                <!-- Staff ID (Read-Only) -->
                <label for="staffID">Staff ID:</label>
                <input type="text" id="staffID" name="staffID" value="123456" readonly>

                <!-- Faculty (Read-Only) -->
                <label for="faculty">Faculty:</label>
                <input type="text" id="faculty" name="faculty" value="Engineering" readonly>

                <!-- Phone Number -->
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" value="123-456-7890">

                <!-- Email -->
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="john.doe@example.com">

                <!-- Password -->
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" oninput="checkPassword()">

                <!-- Confirm Password (shown only if Password is entered) -->
                <div id="confirmPasswordDiv" style="display:none;">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                </div>

                <!-- Save Button -->
                <input type="submit" value="Save">
            </form>

            <script>
                // Function to show/hide Confirm Password based on Password input
                function checkPassword() {
                    var passwordInput = document.getElementById('password');
                    var confirmPasswordDiv = document.getElementById('confirmPasswordDiv');
                    if (passwordInput.value.trim() !== '') {
                        confirmPasswordDiv.style.display = 'block';
                    } else {
                        confirmPasswordDiv.style.display = 'none';
                    }
                }
            </script>
        </div>
    </div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('mainContent').classList.toggle('expanded');
            document.getElementById('mainContent').classList.toggle('collapsed');

        });
    </script>
</body>

</html>