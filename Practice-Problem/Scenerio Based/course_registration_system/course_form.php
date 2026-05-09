<!DOCTYPE html>
<html>
<head>
    <title>Student Course Registration</title>
    <script src="ajax.js"></script>
</head>
<body>

<h2>Student Course Registration System</h2>

<p id="message" style="color:green;"></p>

<form id="courseForm">
    Student Name:
    <input type="text" name="student_name">
    <span id="studentNameError" style="color:red;"></span>
    <br><br>

    Student ID:
    <input type="text" name="student_id">
    <span id="studentIdError" style="color:red;"></span>
    <br><br>

    Course Name:
    <input type="text" name="course_name">
    <span id="courseNameError" style="color:red;"></span>
    <br><br>

    Semester:
    <select name="semester">
        <option value="">Select Semester</option>
        <option value="Spring">Spring</option>
        <option value="Summer">Summer</option>
        <option value="Fall">Fall</option>
    </select>
    <span id="semesterError" style="color:red;"></span>
    <br><br>

    <input type="submit" value="Add Registration">
</form>

<hr>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Student ID</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="registrationTable"></tbody>
</table>

</body>
</html>