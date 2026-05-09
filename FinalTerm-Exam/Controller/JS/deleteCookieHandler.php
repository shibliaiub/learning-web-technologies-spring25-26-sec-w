<?php 

setcookie("food", "random", time() - 1,"/");

Header("Location: ../View/dashboard.php");

?>