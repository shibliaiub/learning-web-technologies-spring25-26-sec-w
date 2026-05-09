<?php

require_once __DIR__ . "/../app/controllers/AuthController.php";

$auth = new AuthController($conn);

$page = $_GET["page"] ?? "signin";

switch ($page) {
    case "signup":
        $auth->signup();
        break;

    case "signin":
        $auth->signin();
        break;

    case "dashboard":
        $auth->dashboard();
        break;

    case "logout":
        $auth->logout();
        break;

    default:
        header("Location: index.php?page=signin");
        exit;
}