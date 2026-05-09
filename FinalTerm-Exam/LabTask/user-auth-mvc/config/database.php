<?php

$conn = mysqli_connect("localhost", "root", "", "user_auth_mvc");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}