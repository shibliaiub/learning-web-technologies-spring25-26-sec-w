<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<p>
    Welcome, 
    <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
</p>

<p>You are successfully logged in.</p>

<a href="index.php?page=logout">Logout</a>

</body>
</html>