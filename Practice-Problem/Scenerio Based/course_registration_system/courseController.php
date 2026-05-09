<?php
include "db.php";
include "courseModel.php";

$errors = [];
$message = "";

if (isset($_POST["action"])) {

    if ($_POST["action"] == "add") {
        $studentName = $_POST["student_name"];
        $studentId = $_POST["student_id"];
        $courseName = $_POST["course_name"];
        $semester = $_POST["semester"];

        if (empty($studentName)) {
            $errors["student_name"] = "Student name is required";
        } elseif (!preg_match("/^[a-zA-Z ]+$/", $studentName)) {
            $errors["student_name"] = "Name can contain only letters and spaces";
        }

        if (empty($studentId)) {
            $errors["student_id"] = "Student ID is required";
        } elseif (!preg_match("/^STU-[0-9]+$/", $studentId)) {
            $errors["student_id"] = "Student ID format must be like STU-101";
        }

        if (empty($courseName)) {
            $errors["course_name"] = "Course name is required";
        } elseif (strlen($courseName) < 3) {
            $errors["course_name"] = "Course name must be at least 3 characters";
        }

        if (empty($semester)) {
            $errors["semester"] = "Semester is required";
        } elseif (!in_array($semester, ["Spring", "Summer", "Fall"])) {
            $errors["semester"] = "Invalid semester selected";
        }

        if (count($errors) == 0) {
            if (addRegistration($conn, $studentName, $studentId, $courseName, $semester)) {
                $message = "Registration added successfully";
            } else {
                $message = "Failed to add registration";
            }
        }
    }

    if ($_POST["action"] == "delete") {
        $id = $_POST["id"];

        if (deleteRegistration($conn, $id)) {
            $message = "Registration deleted successfully";
        } else {
            $message = "Failed to delete registration";
        }
    }
}

$registrations = [];
$result = getAllRegistrations($conn);

while ($row = mysqli_fetch_assoc($result)) {
    $registrations[] = $row;
}

echo json_encode([
    "errors" => $errors,
    "message" => $message,
    "registrations" => $registrations
]);
?>