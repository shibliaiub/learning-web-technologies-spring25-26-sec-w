<?php
include "../Model/DatabaseConnection.php";
session_start();

$username = $_POST["username"]; // REQUEST 
$password = $_POST["password"]; // REQUEST
$uploadFile = $_FILES["fileupload"];

// echo "<h1>Hi, Mr $username</h1>";
// echo "<h2>We know your password, look-> $password</h2>";

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
    $_SESSION["username"] = $username;
    Header("Location: ../View/login.php");
}else{
    $path="";
    if($uploadFile){
        $uploadDirectory = "../uploads/";
        $path = $uploadDirectory . basename($uploadFile["name"]);
        $response = move_uploaded_file($uploadFile["tmp_name"], $path);
        echo "Path : ".$path;
        echo "<br/>Response : ".$response;
    }

    $db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->signUp($connection, "users", $username, $password, $path);
    if($result){
    Header("Location: ../View/login.php");
    }else{
        $hasPasswordError = true;
    }
    
}

?>