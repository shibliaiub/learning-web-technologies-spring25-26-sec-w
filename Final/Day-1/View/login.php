<?php 
session_start();

$usernameError = $_SESSION["usernameError"];
$passwordError = $_SESSION["passwordError"];

unset($_SESSION["usernameError"]);
unset($_SESSION["passwordError"]);


?>

<html>
    <body>

<form method="get" action="../Controller/loginValidation.php">
    <table>
<tr>
    <td>Username</td>
    <td><input type="text" name="username"/></td>
    <td style="color:red"><?php echo "$usernameError";?> </td>
</tr>

<tr>
    <td>Password</td>
    <td><input type="password" name="password"/></td>
    <td style="color:red"><?php echo "$passwordError";?> </td>
</tr>
<tr>
    <td></td>
    <td ><input type="submit" name="submit"/></td>
</tr>
</table>
</form>
</body>
</html>