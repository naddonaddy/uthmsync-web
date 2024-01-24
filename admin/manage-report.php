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
            <h2>Manage Report</h2>

            <div class="report-filters">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate">

                <label for="endDate">End Date:</label>
                <input type="date" id="endDate" name="endDate">

                <label for="role">By Role:</label>
                <select id="role" name="role">
                    <option value="all">All</option>
                    <option value="staff">Staff</option>
                    <option value="student">Student</option>
                </select>

                <br></br>

                <label for="ptj">By PTJ (Staff Only):</label>
                <input type="text" id="ptj" name="ptj" placeholder="Enter PTJ">

                <label for="faculty">By Faculty (Student Only):</label>
                <input type="text" id="faculty" name="faculty" placeholder="Enter Faculty">

                <label for="activityName">Search by Activity Name:</label>
                <input type="text" id="activityName" name="activityName" placeholder="Enter Activity Name">

                <label for="location">Search by Location:</label>
                <input type="text" id="location" name="location" placeholder="Enter Location">

                <label for="userID">Search by StaffID or StudentID:</label>
                <input type="text" id="userID" name="userID" placeholder="Enter StaffID or StudentID">

                <button id="generateReportButton">Generate Report</button>
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