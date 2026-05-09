<?php
$success = "";

$conn = new mysqli("localhost", "root", "", "university_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $department = $_POST["department"];

    $sql = "INSERT INTO students (name, email, age, department)
            VALUES ('$name', '$email', '$age', '$department')";

    if ($conn->query($sql) === TRUE) {
        $success = "Registration Successful";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Student Registration Form</h2>

<form method="post" action="">
    Name:
    <input type="text" name="name"><br><br>

    Email:
    <input type="email" name="email"><br><br>

    Age:
    <input type="number" name="age"><br><br>

    Department:
    <input type="text" name="department"><br><br>

    <input type="submit" name="submit" value="Register">
</form>

<h3 style="color:green;"><?php echo $success; ?></h3>

</body>
</html>