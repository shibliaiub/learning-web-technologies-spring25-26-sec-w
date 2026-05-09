<?php

require_once __DIR__ . "/../models/User.php";

class AuthController
{
    private $userModel;

    public function __construct($conn)
    {
        $this->userModel = new User($conn);
    }

    public function signup()
    {
        $error = "";
        $name = "";
        $email = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = trim($_POST["name"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $password = trim($_POST["password"] ?? "");
            $confirmPassword = trim($_POST["confirm_password"] ?? "");

            if ($name === "" || $email === "" || $password === "" || $confirmPassword === "") {
                $error = "All fields are required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email address.";
            } elseif (strlen($password) < 6) {
                $error = "Password must be at least 6 characters.";
            } elseif ($password !== $confirmPassword) {
                $error = "Passwords do not match.";
            } elseif ($this->userModel->findByEmail($email)) {
                $error = "Email already exists.";
            } else {
                $this->userModel->create($name, $email, $password);

                header("Location: index.php?page=signin&success=1");
                exit;
            }
        }

        require __DIR__ . "/../views/signup.php";
    }

    public function signin()
    {
        $error = "";
        $email = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = trim($_POST["email"] ?? "");
            $password = trim($_POST["password"] ?? "");

            if ($email === "" || $password === "") {
                $error = "Email and password are required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email address.";
            } else {
                $user = $this->userModel->findByEmail($email);

                if ($user && password_verify($password, $user["password"])) {
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["user_name"] = $user["name"];

                    header("Location: index.php?page=dashboard");
                    exit;
                } else {
                    $error = "Invalid email or password.";
                }
            }
        }

        require __DIR__ . "/../views/signin.php";
    }

    public function dashboard()
    {
        if (!isset($_SESSION["user_id"])) {
            header("Location: index.php?page=signin");
            exit;
        }

        require __DIR__ . "/../views/dashboard.php";
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        header("Location: index.php?page=signin");
        exit;
    }
}