<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
</head>
<body>

<h2>Sign In</h2>

<?php if (isset($_GET["success"])) : ?>
    <p style="color:green;">Account created successfully. Please sign in.</p>
<?php endif; ?>

<?php if (!empty($error)) : ?>
    <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form method="POST" action="index.php?page=signin">
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

    <button type="submit">Sign In</button>
</form>

<p>
    Do not have an account?
    <a href="index.php?page=signup">Sign Up</a>
</p>

</body>
</html>