<?php
$conn = new mysqli("localhost", "root", "", "student_records");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<body>

<h2>Student Records</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Registration No</th>
            <th>Program</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["registration_no"] . "</td>";
        echo "<td>" . $row["program"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}
?>

</body>
</html>