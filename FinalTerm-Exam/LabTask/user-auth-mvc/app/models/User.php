<?php

class User
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_assoc($result);
    }

    public function create($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPassword);

        return mysqli_stmt_execute($stmt);
    }
}