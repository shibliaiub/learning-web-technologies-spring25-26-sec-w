window.onload = function () {
    loadAttendance();

    document.getElementById("attendanceForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append("action", "add");

        fetch("attendanceController.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => showResponse(data));
    });
};

function loadAttendance() {
    let formData = new FormData();
    formData.append("action", "load");

    fetch("attendanceController.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => showResponse(data));
}

function deleteAttendance(id) {
    let formData = new FormData();
    formData.append("action", "delete");
    formData.append("id", id);

    fetch("attendanceController.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => showResponse(data));
}

function showResponse(data) {
    document.getElementById("employeeNameError").innerHTML = data.errors.employee_name || "";
    document.getElementById("employeeIdError").innerHTML = data.errors.employee_id || "";
    document.getElementById("attendanceDateError").innerHTML = data.errors.attendance_date || "";
    document.getElementById("statusError").innerHTML = data.errors.status || "";
    document.getElementById("message").innerHTML = data.message || "";

    let table = "";

    data.attendance.forEach(row => {
        table += `
            <tr>
                <td>${row.id}</td>
                <td>${row.employee_name}</td>
                <td>${row.employee_id}</td>
                <td>${row.attendance_date}</td>
                <td>${row.status}</td>
                <td><button onclick="deleteAttendance(${row.id})">Delete</button></td>
            </tr>
        `;
    });

    document.getElementById("attendanceTable").innerHTML = table;
}