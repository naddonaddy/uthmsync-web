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
            <h2>Manage User</h2>

            <!-- Search bar and search button -->
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search...">
                <button class="search-button">Search</button>
            </div>

            <!-- Cards container -->
            <div class="card-container">
                <!-- Admin Card 1 -->
                <div class="admin-card">
                    <div class="admin-card-details">
                        <img src="user_avatar.jpg" alt="User Avatar">
                        <h3>Name 1</h3>
                        <p>Staff ID: 12345</p>
                        <p>Faculty: FSKTM</p>
                    </div>
                    <div class="admin-card-buttons">
                        <!-- <button class="make-admin">Make Admin</button> -->
                        <button class="delete">Delete</button>
                    </div>

                </div>

                <!-- Admin Card 2 -->
                <div class="admin-card">
                    <img src="user_avatar.jpg" alt="User Avatar">
                    <div class="admin-card-details">
                        <h3>Name 2</h3>
                        <p>Staff ID: 67890</p>
                        <p>Faculty: FSKTM</p>
                    </div>
                    <div class="admin-card-buttons">
                        <!-- <button class="make-admin">Make Admin</button> -->
                        <button class="delete">Delete</button>
                    </div>

                </div>

                <!-- Admin Card 3 -->
                <div class="admin-card">
                    <div class="admin-card-details">
                        <img src="user_avatar.jpg" alt="User Avatar">
                        <h3>Name 3</h3>
                        <p>Staff ID: 54321</p>
                        <p>Faculty: FSKTM</p>
                    </div>
                    <div class="admin-card-buttons">
                        <!-- <button class="make-admin">Make Admin</button> -->
                        <button class="delete">Delete</button>
                    </div>

                </div>

                <!-- Repeat the structure for additional admin cards -->

            </div>

        </div>

</body>

</html>