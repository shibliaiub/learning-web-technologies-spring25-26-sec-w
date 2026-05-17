<?php
$host = "localhost";
$dbname = "hotel_db";
$dbuser = "root";
$dbpass = "";

$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
