<?php
function getAllAttendance($conn) {
    return mysqli_query($conn, "SELECT * FROM attendance");
}

function addAttendance($conn, $employeeName, $employeeId, $attendanceDate, $status) {
    $sql = "INSERT INTO attendance (employee_name, employee_id, attendance_date, status)
            VALUES ('$employeeName', '$employeeId', '$attendanceDate', '$status')";
    return mysqli_query($conn, $sql);
}

function deleteAttendance($conn, $id) {
    return mysqli_query($conn, "DELETE FROM attendance WHERE id=$id");
}
?>