<!DOCTYPE html>
<html>
<body>

<h2>Student Registration Form</h2>

<form method="post" action="">

    Full Name:
    <input type="text" name="fullName">
    <br><br>

    Email:
    <input type="text" name="email">
    <br><br>

    Username:
    <input type="text" name="username">
    <br><br>

    Password:
    <input type="password" name="password">
    <br><br>

    Confirm Password:
    <input type="password" name="confirmPassword">
    <br><br>

    Age:
    <input type="number" name="age">
    <br><br>

    Gender:
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <br><br>

    Course:
    <select name="course">
        <option value="">Select Course</option>
        <option value="CSE">CSE</option>
        <option value="CS">CS</option>
        <option value="SE">SE</option>
    </select>

    <br><br>

    <input type="checkbox" name="terms">
    I agree to Terms & Conditions

    <br><br>

    <input type="submit" name="register" value="Register">

</form>

<?php

if(isset($_POST["register"])){

    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $age = $_POST["age"];
    $gender = $_POST["gender"] ?? "";
    $course = $_POST["course"];
    $terms = isset($_POST["terms"]);

    $hasError = false;

    // Full Name Validation
    if(empty($fullName)){
        echo "Full Name is required <br>";
        $hasError = true;
    }

    if(is_numeric($fullName)){
        echo "Name cannot be only numbers <br>";
        $hasError = true;
    }

    // Email Validation
    if(empty($email)){
        echo "Email is required <br>";
        $hasError = true;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format <br>";
        $hasError = true;
    }

    // Username Validation
    if(empty($username)){
        echo "Username is required <br>";
        $hasError = true;
    }

    if(strlen($username) < 5){
        echo "Username must be at least 5 characters <br>";
        $hasError = true;
    }

    // Password Validation
    if(empty($password)){
        echo "Password is required <br>";
        $hasError = true;
    }

    if(strlen($password) < 6){
        echo "Password must be at least 6 characters <br>";
        $hasError = true;
    }

    // Confirm Password Validation
    if($password != $confirmPassword){
        echo "Passwords do not match <br>";
        $hasError = true;
    }

    // Age Validation
    if(empty($age)){
        echo "Age is required <br>";
        $hasError = true;
    }

    if($age < 18){
        echo "Age must be 18 or above <br>";
        $hasError = true;
    }

    // Gender Validation
    if(empty($gender)){
        echo "Please select gender <br>";
        $hasError = true;
    }

    // Course Validation
    if(empty($course)){
        echo "Please select course <br>";
        $hasError = true;
    }

    // Terms Validation
    if(!$terms){
        echo "Please accept Terms and Conditions <br>";
        $hasError = true;
    }

    // Success Output
    if(!$hasError){

        echo "<h3>Registration Successful!</h3>";

        echo "Full Name: " . $fullName . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Username: " . $username . "<br>";
        echo "Age: " . $age . "<br>";
        echo "Gender: " . $gender . "<br>";
        echo "Course: " . $course . "<br>";
    }
}

?>

</body>
</html>