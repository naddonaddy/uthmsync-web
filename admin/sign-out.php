<?php
// Start the session
session_start();

// Clear all session data
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page
header("Location: login.php");
exit();
?>
