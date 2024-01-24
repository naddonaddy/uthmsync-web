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

        <!-- Inside the main-content div -->
        <div class="main-content" id="mainContent">
            <h2>User Activities Overview</h2>

            <!-- User Activities Table -->
            <table class="user-activities-table">
                <thead>
                    <tr>
                        <th>Timestamp</th>
                        <th>User ID</th>
                        <th>Activity Type</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample User Activity Rows -->
                    <tr>
                        <td>2023-01-01 10:00:00</td>
                        <td>123456</td>
                        <td>Login</td>
                        <td>User logged an activity</td>
                    </tr>
                    <tr>
                        <td>2023-01-02 15:30:00</td>
                        <td>789012</td>
                        <td>Update Profile</td>
                        <td>User finished their activity</td>
                    </tr>
                    <!-- Add more rows based on your data -->
                </tbody>
            </table>

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