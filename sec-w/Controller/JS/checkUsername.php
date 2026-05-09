<?php 
include "../Model/DatabaseConnection.php";

$username = $_POST["username"] ?? "";
if(!$username){
    echo "username is required";
}else{

    $db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->checkUser($connection, "users", $username);
    if($result->num_rows > 0){
        echo "Username is already taken";
    }else{
        echo "Username is available";
    }
}

?>