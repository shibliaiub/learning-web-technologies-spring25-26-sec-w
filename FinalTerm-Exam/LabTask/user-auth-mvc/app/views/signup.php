<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>

<h2>Create Account</h2>

<?php if (!empty($error)) : ?>
    <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form method="POST" action="index.php?page=signup">
    <input 
        type="text" 
        name="name" 
        placeholder="Full Name"
        value="<?php echo htmlspecialchars($name); ?>"
    >
    <br><br>

    <input 
        type="email" 
        name="email" 
        placeholder="Email"
        value="<?php echo htmlspecialchars($email); ?>"
    >
    <br><br>

    <input 
        type="password" 
        name="password" 
        placeholder="Password"
    >
    <br><br>

    <input 
        type="password" 
        name="confirm_password" 
        placeholder="Confirm Password"
    >
    <br><br>

    <button type="submit">Sign Up</button>
</form>

<p>
    Already have an account?
    <a href="index.php?page=signin">Sign In</a>
</p>

</body>
</html>