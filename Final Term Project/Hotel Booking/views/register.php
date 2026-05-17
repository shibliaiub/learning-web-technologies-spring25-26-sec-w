<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Guest Registration</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <script src="../public/assets/js/validation.js"></script>
</head>
<body>
<div class="container">
    <h2>Guest Registration</h2>
    <?php
    if (isset($_SESSION["error"])) {
        echo "<p class='error'>" . $_SESSION["error"] . "</p>";
        unset($_SESSION["error"]);
    }
    ?>
    <form method="post" action="../controllers/AuthController.php" onsubmit="return validateRegisterForm()">
        <input type="hidden" name="action" value="register">
        <label>Name</label>
        <input type="text" name="name" id="name">
        <span id="nameError" class="error"></span>
        <label>Email</label>
        <input type="email" name="email" id="email">
        <span id="emailError" class="error"></span>
        <label>Password</label>
        <input type="password" name="password" id="password">
        <span id="passwordError" class="error"></span>
        <label>Phone</label>
        <input type="text" name="phone" id="phone">
        <span id="phoneError" class="error"></span>
        <label>Nationality</label>
        <input type="text" name="nationality" id="nationality">
        <span id="nationalityError" class="error"></span>
        <button type="submit">Register</button>
    </form>
    <p>Already registered? <a href="login.php">Login</a></p>
</div>
</body>
</html>
