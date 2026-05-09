<?php
include "../Model/DatabaseConnection.php";
session_start();

$username = $_POST["username"]; // REQUEST 
$password = $_POST["password"]; // REQUEST

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
    $isLoggedIn = false;
    // $users = array("rafiq"=>"123456", "jabbar"=>"67890", "abbas"=>"patoary");
    // foreach($users as $user=>$pass){
    //     if($user == $username && $pass == $password){
    //     $isLoggedIn = true;
    //        $_SESSION["isLoggedIn"] = true;
    //        $_SESSION["loggedInUser"] = $user;
    //        Header("Location: ../View/dashboard.php");
    //         exit();
    //     }
    // }
    $db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->signIn($connection, "users", $username, $password);
    if($result->num_rows == 1){
        while($row = $result->fetch_assoc()){
           $isLoggedIn = true;
           $_SESSION["isLoggedIn"] = true;
           $_SESSION["id"] = $row["id"];
           $_SESSION["loggedInUser"] = $row["username"];
           $_SESSION["image_path"] = $row["image_path"];
           Header("Location: ../View/dashboard.php");
            exit();
        }
         
    }
    if(!$isLoggedIn){
        $_SESSION["username"] = $username;
        $_SESSION["loggingError"] = "Username or password is incorrect!";
        Header("Location: ../View/login.php");
    }
    
}

?>