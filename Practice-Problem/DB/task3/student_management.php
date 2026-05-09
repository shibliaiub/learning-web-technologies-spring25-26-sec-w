<?php
$conn = new mysqli("localhost", "root", "", "student_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$editMode = false;
$editId = "";
$editName = "";
$editEmail = "";
$editRegistrationNo = "";
$editDepartment = "";

/* CREATE */
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $registration_no = $_POST["registration_no"];
    $department = $_POST["department"];

    $sql = "INSERT INTO students (name, email, registration_no, department)
            VALUES ('$name', '$email', '$registration_no', '$department')";

    if ($conn->query($sql) === TRUE) {
        $message = "Student added successfully.";
    } else {
        $message = "Error: " . $conn->error;
    }
}

/* DELETE */
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $sql = "DELETE FROM students WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $message = "Student deleted successfully.";
    } else {
        $message = "Error: " . $conn->error;
    }
}

/* EDIT DATA LOAD */
if (isset($_GET["edit"])) {
    $editMode = true;
    $id = $_GET["edit"];

    $sql = "SELECT * FROM students WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $editId = $row["id"];
        $editName = $row["name"];
        $editEmail = $row["email"];
        $editRegistrationNo = $row["registration_no"];
        $editDepartment = $row["department"];
    }
}

/* UPDATE */
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $department = $_POST["department"];

    $sql = "UPDATE students 
            SET name='$name', email='$email', department='$department'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $message = "Student updated successfully.";
        $editMode = false;
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Student Management System</h2>

<h3 style="color:green;"><?php echo $message; ?></h3>

<?php if ($editMode) { ?>

<h3>Edit Student</h3>

<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $editId; ?>">

    Student Name:
    <input type="text" name="name" value="<?php echo $editName; ?>"><br><br>

    Email:
    <input type="email" name="email" value="<?php echo $editEmail; ?>"><br><br>

    Registration Number:
    <input type="text" name="registration_no" value="<?php echo $editRegistrationNo; ?>" readonly><br><br>

    Department:
    <input type="text" name="department" value="<?php echo $editDepartment; ?>"><br><br>

    <input type="submit" name="update" value="Update Student">
</form>

<?php } else { ?>

<h3>Add Student</h3>

<form method="post" action="">
    Student Name:
    <input type="text" name="name"><br><br>

    Email:
    <input type="email" name="email"><br><br>

    Registration Number:
    <input type="text" name="registration_no"><br><br>

    Department:
    <input type="text" name="department"><br><br>

    <input type="submit" name="add" value="Add Student">
</form>

<?php } ?>

<hr>

<h3>All Student Records</h3>

<?php
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Registration No</th>
            <th>Department</th>
            <th>Action</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["registration_no"] . "</td>";
        echo "<td>" . $row["department"] . "</td>";
        echo "<td>
                <a href='student_management.php?edit=" . $row["id"] . "'>Edit</a> |
                <a href='student_management.php?delete=" . $row["id"] . "'>Delete</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No student records found.";
}
?>

</body>
</html>