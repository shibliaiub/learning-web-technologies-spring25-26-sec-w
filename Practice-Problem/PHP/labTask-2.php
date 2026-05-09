<!DOCTYPE html>
<html>
<body>

<h2>Employee Leave Request System</h2>

<form method="post" action="">
    Employee Name:
    <input type="text" name="employeeName"><br><br>

    Department:
    <input type="text" name="department"><br><br>

    Number of Leave Days:
    <input type="number" name="leaveDays"><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST["submit"])) {
    $employeeName = $_POST["employeeName"];
    $department = $_POST["department"];
    $leaveDays = $_POST["leaveDays"];

    if ($leaveDays <= 5) {
        $decision = "Leave Approved";
    } else {
        $decision = "Pending Approval";
    }

    echo "<h3>Leave Request Decision</h3>";
    echo "Employee Name: " . $employeeName . "<br>";
    echo "Department: " . $department . "<br>";
    echo "Leave Days: " . $leaveDays . "<br>";
    echo "Decision: " . $decision;
}
?>

</body>
</html>