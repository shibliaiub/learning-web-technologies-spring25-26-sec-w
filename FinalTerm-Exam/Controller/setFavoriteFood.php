<?php 

$favFood = $_POST["favoriteFood"];

if(!$favFood){
    exit("");
}

setcookie("food", $favFood, time() + 3600,"/");

Header("Location: ../View/dashboard.php");
?>