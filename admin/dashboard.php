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
            <h2>Welcome, Nadhirah!</h2>
            <div class="card-container">
                <!-- First row of cards -->
                <div class="card">
                    <div class="card-title">Total Users</div>
                    <div class="card-content">100</div>
                </div>
                <div class="card">
                    <div class="card-title">Total Admin</div>
                    <div class="card-content">100</div>
                </div>
            </div>

            <!-- Second row of cards (bar charts) -->
            <div class="card-container">
                <div class="card chart-card">
                    <div class="card-title">User Growth</div>
                    <div class="bar-chart"> <!-- Dummy bar chart -->
                        <!-- You can add your chart elements here -->
                    </div>
                </div>
                <div class="card chart-card">
                    <div class="card-title">User Activities Rate</div>
                    <div class="bar-chart"> <!-- Dummy bar chart -->
                        <!-- You can add your chart elements here -->
                    </div>
                </div>
            </div>

            <!-- Third row of cards (pie charts) -->
            <div class="card-container">
                <div class="card chart-card">
                    <div class="card-title">User Distribution</div>
                    <div class="pie-chart"> <!-- Dummy pie chart -->
                        <!-- You can add your chart elements here -->
                    </div>
                </div>
                <div class="card chart-card">
                    <div class="card-title">Admin Distribution</div>
                    <div class="pie-chart"> <!-- Dummy pie chart -->
                        <!-- You can add your chart elements here -->
                    </div>
                </div>
            </div>
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