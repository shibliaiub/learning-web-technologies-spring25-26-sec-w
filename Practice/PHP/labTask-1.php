<!DOCTYPE html>
<html>
<body>

<h2>Student Pass/Fail System</h2>

<form method="post" action="">
    Student Name:
    <input type="text" name="studentName"><br><br>

    Marks:
    <input type="number" name="marks"><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST["submit"])) {
    $studentName = $_POST["studentName"];
    $marks = $_POST["marks"];

    if ($marks >= 50) {
        $result = "Pass";
    } else {
        $result = "Fail";
    }

    echo "<h3>Result</h3>";
    echo "Student Name: " . $studentName . "<br>";
    echo "Marks: " . $marks . "<br>";
    echo "Status: " . $result;
}
?>

</body>
</html>