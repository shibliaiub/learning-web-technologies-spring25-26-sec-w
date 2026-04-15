<?php
session_start();

$username = $_GET["username"]; // REQUEST 
$password = $_GET["password"]; // REQUEST

echo "<h1>Hi, Mr $username</h1>";
echo "<h2>We know your password, look-> $password</h2>";

$hasUsernameError = true;
$hasPasswordError = true;

if(!$username){
    $hasUsernameError = true;
    $_SESSION["usernameError"] = "Username is required";
}else{
    $hasUsernameError = false;
    unset($_SESSION["usernameError"]);
}

if(!$password){
    $hasPasswordError = true;
    $_SESSION["passwordError"] = "Password is required";
}else{
    $hasPasswordError = false;
    unset($_SESSION["passwordError"]);
}

if($hasUsernameError || $hasPasswordError){
    Header("Location: ../View/login.php");
}else{
    
}

?>