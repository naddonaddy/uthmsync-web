<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-user/dashboard-user.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>UTHMSync</title>
</head>

<body>
    <div class="wrapper">
        <button id="sidebarCollapse">☰</button>
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>UTHMSync</h3>
            </div>
            <ul class="list-unstyled components">
                <li>
                    Add Activity
                </li>
                <li>
                    Activity History
                </li>
            </ul>
        </nav>

        <div id="content">
            <div class="menu-container">
                <div class="activity-container">
                    <button class="add-activity-button" onclick="openModal()">Add Activity</button>
                </div>
                <div class="activity-container">
                    <button class="activity-history-button">Activity History</button>
                </div>
            </div>
            <img class="bottom-right-image" src="assets\Solidarity-pana.png" alt="Solidarity Image">
        </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2 style="text-align: center;">Add Activity</h2>
                <form id="activityForm" method="post" action="">
                    <label for="activityName">Activity name:</label>
                    <input type="text" id="activityName" name="activityName" required>

                    <label for="activityDescription">Activity description:</label>
                    <textarea id="activityDescription" name="activityDescription" required></textarea>

                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required readonly>

                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required readonly>

                    <label for="startTime">Start time:</label>
                    <input type="time" id="startTime" name="startTime" required readonly>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>

        <?php
        // Include the database connection file
        include_once 'db.php';

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $activityName = $_POST['activityName'];
            $activityDescription = $_POST['activityDescription'];
            $location = $_POST['location'];
            $date = $_POST['date'];
            $startTime = $_POST['startTime'];

            // Check if the user is logged in and retrieve the user ID from the session
            session_start(); // Start the session
            if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'student') {
                $studentID = $_SESSION['user_id'];

                // Create an instance of the Database class and establish a connection
                $database = new Database('localhost', 'root', '', 'uthmsync');
                $conn = $database->connect();

                // Insert data into the database
                $sql = "INSERT INTO student_activities (activityName, activityDescription, location, startTime, endTime, date, studentID)
                    VALUES ('$activityName', '$activityDescription', '$location', '$startTime', '', '$date', '$studentID')";

                if ($conn->query($sql) === TRUE) {
                    echo "Activity added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close the database connection
                $conn->close();
            } else {
                // Handle the case when the user is not logged in
                echo "User not logged in or invalid user role.";
            }
        }
        ?>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const sidebar = document.getElementById("sidebar");
                const content = document.getElementById("content");
                const sidebarCollapse = document.getElementById("sidebarCollapse");

                sidebarCollapse.addEventListener("click", function () {
                    sidebar.classList.toggle("active");
                    content.classList.toggle("active");

                    // Update the position of sidebarCollapse based on the sidebar's state
                    if (sidebar.classList.contains("active")) {
                        sidebarCollapse.style.position = "fixed";
                        sidebarCollapse.style.left = "10px";
                        sidebarCollapse.style.top = "10px";
                    } else {
                        sidebarCollapse.style.position = "absolute";
                        sidebarCollapse.style.left = "auto";
                        sidebarCollapse.style.top = "0";
                        sidebarCollapse.style.right = "10px";
                    }
                });

                const activityForm = document.getElementById("activityForm");
                activityForm.addEventListener("submit", function (event) {
                    event.preventDefault();

                    closeModal();
                });
            });

            // Function to open the modal and automatically detect location
            function openModal() {
                const modal = document.getElementById("myModal");
                const currentDate = new Date().toISOString().split('T')[0];
                const currentTime = new Date().toLocaleTimeString('en-US', { hour12: false });

                document.getElementById("date").value = currentDate;
                document.getElementById("startTime").value = currentTime;

                // Use Geolocation API to automatically detect user's location
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function (position) {
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;

                            // Update the location input with the coordinates
                            const locationInput = document.getElementById("location");
                            locationInput.value = `Latitude: ${latitude}, Longitude: ${longitude}`;
                        },
                        function (error) {
                            console.error("Error getting location:", error.message);
                        }
                    );
                } else {
                    alert("Geolocation is not supported by this browser.");
                }

                modal.style.display = "flex";
            }

            // Function to close the modal
            function closeModal() {
                const modal = document.getElementById("myModal");
                modal.style.display = "none";
            }
        </script>
    </div>
</body>

</html>