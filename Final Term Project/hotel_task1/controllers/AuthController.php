<?php
session_start();
require_once "../config/db.php";
require_once "../models/UserModel.php";

function redirectTo($path) {
    header("Location: " . $path);
    exit();
}

function setError($message, $location) {
    $_SESSION["error"] = $message;
    redirectTo($location);
}

$action = $_POST["action"] ?? "";

if ($action == "register") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $phone = trim($_POST["phone"] ?? "");
    $nationality = trim($_POST["nationality"] ?? "");

    if ($name == "" || $email == "" || $password == "" || $phone == "" || $nationality == "") {
        setError("All fields are required.", "../views/register.php");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setError("Invalid email format.", "../views/register.php");
    }
    if (strlen($password) < 6) {
        setError("Password must be at least 6 characters.", "../views/register.php");
    }
    $existing = getUserByEmail($conn, $email);
    if (mysqli_num_rows($existing) > 0) {
        setError("Email already registered.", "../views/register.php");
    }
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    if (createUser($conn, $name, $email, $passwordHash, $phone, $nationality)) {
        $_SESSION["success"] = "Registration successful. Please login.";
        redirectTo("../views/login.php");
    }
    setError("Registration failed.", "../views/register.php");
}

if ($action == "login") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $remember = isset($_POST["remember"]);

    if ($email == "" || $password == "") {
        setError("Email and password are required.", "../views/login.php");
    }
    $result = getUserByEmail($conn, $email);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user["password_hash"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["role"] = $user["role"];

            if ($remember) {
                $plainToken = bin2hex(random_bytes(32));
                $hashedToken = hash("sha256", $plainToken);
                updateRememberToken($conn, $user["id"], $hashedToken);
                setcookie("remember_me", $plainToken, time() + (86400 * 30), "/");
            }
            if ($user["role"] == "admin") {
                redirectTo("../views/admin_dashboard.php");
            }
            redirectTo("../views/profile.php");
        }
    }
    setError("Invalid email or password.", "../views/login.php");
}

if ($action == "update_profile") {
    if (!isset($_SESSION["user_id"])) {
        redirectTo("../views/login.php");
    }
    $id = $_SESSION["user_id"];
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $nationality = trim($_POST["nationality"] ?? "");
    $preferredRoomTypeId = $_POST["preferred_room_type_id"] ?? "";
    $specialRequests = trim($_POST["special_requests"] ?? "");

    if ($name == "" || $email == "" || $phone == "" || $nationality == "") {
        setError("Name, email, phone and nationality are required.", "../views/profile.php");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setError("Invalid email format.", "../views/profile.php");
    }
    if (isset($_POST["subscribe_offers"])) {
        setcookie("subscribe_offers", "1", time() + (86400 * 365), "/");
    } else {
        setcookie("subscribe_offers", "", time() - 3600, "/");
    }
    if (updateProfile($conn, $id, $name, $email, $phone, $nationality, $preferredRoomTypeId, $specialRequests)) {
        $_SESSION["name"] = $name;
        $_SESSION["success"] = "Profile updated successfully.";
        redirectTo("../views/profile.php");
    }
    setError("Profile update failed.", "../views/profile.php");
}

redirectTo("../views/login.php");
?>
