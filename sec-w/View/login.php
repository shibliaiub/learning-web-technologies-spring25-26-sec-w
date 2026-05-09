<?php 
session_start();

$usernameError = $_SESSION["usernameError"];
$passwordError = $_SESSION["passwordError"];
$username = $_SESSION["username"];
$loggingError = $_SESSION["loggingError"];
$isLoggedIn = $_SESSION["isLoggedIn"];

if($isLoggedIn){
    Header("Location: dashboard.php");
    exit();
}

unset($_SESSION["usernameError"]);
unset($_SESSION["passwordError"]);
unset($_SESSION["username"]);
unset($_SESSION["loggingError"]);


?>

<html>
    <body>

<form method="post" action="../Controller/loginValidation.php">
    <table>
<tr>
    <td>Username</td>
    <td><input type="text" name="username" value="<?php echo $username;?>"/></td>
    <td style="color:red"><?php echo "$usernameError";?> </td>
</tr>

<tr>
    <td>Password</td>
    <td><input type="password" name="password"/></td>
    <td style="color:red"><?php echo "$passwordError";?> </td>
</tr>
<tr>
    <td></td>
    <td style="color:red"><?php echo $loggingError;?></td>
</tr>
<tr>
    <td></td>
    <td ><input type="submit" name="submit"/></td>
</tr>
</table>
</form>
</body>
</html>