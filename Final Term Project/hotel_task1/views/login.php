<?php
session_start();
include "_remember.php";
if (isset($_SESSION["user_id"])) {
    if ($_SESSION["role"] == "admin") {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: profile.php");
    }
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guest Login</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <script src="../public/assets/js/validation.js"></script>
</head>
<body>
<div class="container">
    <h2>Guest Login</h2>
    <?php
    if (isset($_SESSION["success"])) {
        echo "<p class='success'>" . $_SESSION["success"] . "</p>";
        unset($_SESSION["success"]);
    }
    if (isset($_SESSION["error"])) {
        echo "<p class='error'>" . $_SESSION["error"] . "</p>";
        unset($_SESSION["error"]);
    }
    ?>
    <form method="post" action="../controllers/AuthController.php" onsubmit="return validateLoginForm()">
        <input type="hidden" name="action" value="login">
        <label>Email</label>
        <input type="email" name="email" id="loginEmail">
        <span id="loginEmailError" class="error"></span>
        <label>Password</label>
        <input type="password" name="password" id="loginPassword">
        <span id="loginPasswordError" class="error"></span>
        <label class="inline"><input type="checkbox" name="remember" value="1"> Remember Me</label>
        <button type="submit">Login</button>
    </form>
    <p>New guest? <a href="register.php">Register</a></p>
</div>
</body>
</html>
