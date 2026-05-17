<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "../config/db.php";
require_once "../models/UserModel.php";

if (!isset($_SESSION["user_id"]) && isset($_COOKIE["remember_me"])) {
    $plainToken = $_COOKIE["remember_me"];
    $hashedToken = hash("sha256", $plainToken);
    $result = getUserByRememberToken($conn, $hashedToken);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["role"] = $user["role"];
    }
}
?>
