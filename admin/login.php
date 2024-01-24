<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UTHMSync</title>
    <link rel="stylesheet" href="style/style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <div class="login-container">
        <img src="assets\UTHMSynclogo.png" alt="UTHM Sync Logo" class="logo">
        <div class="form-container">
            <form action="dashboard.php" method="post" class="login-form">
                <h3>UTHMSync Admin</h3>
                <input type="text" name="username" placeholder="Username" class="input-field" required>
                <input type="password" name="password" placeholder="Password" class="input-field" required>
                <button type="submit" class="login-button">Login</button>
            </form>
        </div>
    </div>
</body>

</html>