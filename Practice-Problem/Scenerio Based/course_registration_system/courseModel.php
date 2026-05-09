<?php
function getAllRegistrations($conn) {
    return mysqli_query($conn, "SELECT * FROM registrations");
}

function addRegistration($conn, $studentName, $studentId, $courseName, $semester) {
    $sql = "INSERT INTO registrations (student_name, student_id, course_name, semester)
            VALUES ('$studentName', '$studentId', '$courseName', '$semester')";
    return mysqli_query($conn, $sql);
}

function deleteRegistration($conn, $id) {
    return mysqli_query($conn, "DELETE FROM registrations WHERE id=$id");
}
?>