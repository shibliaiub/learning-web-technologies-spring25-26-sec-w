<?php
include "db.php";
include "attendanceModel.php";

$errors = [];
$message = "";

if (isset($_POST["action"])) {

    if ($_POST["action"] == "add") {
        $employeeName = $_POST["employee_name"];
        $employeeId = $_POST["employee_id"];
        $attendanceDate = $_POST["attendance_date"];
        $status = $_POST["status"];

        if (empty($employeeName)) {
            $errors["employee_name"] = "Employee name is required";
        } elseif (!preg_match("/^[a-zA-Z ]+$/", $employeeName)) {
            $errors["employee_name"] = "Name can contain only letters and spaces";
        }

        if (empty($employeeId)) {
            $errors["employee_id"] = "Employee ID is required";
        } elseif (!preg_match("/^EMP-[0-9]+$/", $employeeId)) {
            $errors["employee_id"] = "Employee ID format must be like EMP-101";
        }

        if (empty($attendanceDate)) {
            $errors["attendance_date"] = "Attendance date is required";
        } elseif (!strtotime($attendanceDate)) {
            $errors["attendance_date"] = "Invalid date";
        }

        if (empty($status)) {
            $errors["status"] = "Status is required";
        } elseif (!in_array($status, ["Present", "Absent", "Leave"])) {
            $errors["status"] = "Invalid status selected";
        }

        if (count($errors) == 0) {
            if (addAttendance($conn, $employeeName, $employeeId, $attendanceDate, $status)) {
                $message = "Attendance added successfully";
            } else {
                $message = "Failed to add attendance";
            }
        }
    }

    if ($_POST["action"] == "delete") {
        $id = $_POST["id"];

        if (deleteAttendance($conn, $id)) {
            $message = "Attendance deleted successfully";
        } else {
            $message = "Failed to delete attendance";
        }
    }
}

$attendance = [];
$result = getAllAttendance($conn);

while ($row = mysqli_fetch_assoc($result)) {
    $attendance[] = $row;
}

echo json_encode([
    "errors" => $errors,
    "message" => $message,
    "attendance" => $attendance
]);
?>