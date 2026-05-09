<!DOCTYPE html>
<html>
<head>
    <title>Employee Attendance Management</title>
    <script src="ajax.js"></script>
</head>
<body>

<h2>Employee Attendance Management System</h2>

<p id="message" style="color:green;"></p>

<form id="attendanceForm">
    Employee Name:
    <input type="text" name="employee_name">
    <span id="employeeNameError" style="color:red;"></span>
    <br><br>

    Employee ID:
    <input type="text" name="employee_id">
    <span id="employeeIdError" style="color:red;"></span>
    <br><br>

    Attendance Date:
    <input type="date" name="attendance_date">
    <span id="attendanceDateError" style="color:red;"></span>
    <br><br>

    Status:
    <select name="status">
        <option value="">Select Status</option>
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
        <option value="Leave">Leave</option>
    </select>
    <span id="statusError" style="color:red;"></span>
    <br><br>

    <input type="submit" value="Add Attendance">
</form>

<hr>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Employee ID</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="attendanceTable"></tbody>
</table>

</body>
</html>