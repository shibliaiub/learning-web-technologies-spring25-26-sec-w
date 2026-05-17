<?php
session_start();
include "_remember.php";
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
if ($_SESSION["role"] != "admin") {
    header("Location: profile.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
<div class="container">
    <h2>Admin Dashboard</h2>
    <p>Welcome Admin, <?php echo htmlspecialchars($_SESSION["name"]); ?></p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
