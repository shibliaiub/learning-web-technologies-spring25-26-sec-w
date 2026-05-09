window.onload = function () {
    loadRegistrations();

    document.getElementById("courseForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append("action", "add");

        fetch("courseController.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => showResponse(data));
    });
};

function loadRegistrations() {
    let formData = new FormData();
    formData.append("action", "load");

    fetch("courseController.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => showResponse(data));
}

function deleteRegistration(id) {
    let formData = new FormData();
    formData.append("action", "delete");
    formData.append("id", id);

    fetch("courseController.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => showResponse(data));
}

function showResponse(data) {
    document.getElementById("studentNameError").innerHTML = data.errors.student_name || "";
    document.getElementById("studentIdError").innerHTML = data.errors.student_id || "";
    document.getElementById("courseNameError").innerHTML = data.errors.course_name || "";
    document.getElementById("semesterError").innerHTML = data.errors.semester || "";
    document.getElementById("message").innerHTML = data.message || "";

    let table = "";

    data.registrations.forEach(row => {
        table += `
            <tr>
                <td>${row.id}</td>
                <td>${row.student_name}</td>
                <td>${row.student_id}</td>
                <td>${row.course_name}</td>
                <td>${row.semester}</td>
                <td><button onclick="deleteRegistration(${row.id})">Delete</button></td>
            </tr>
        `;
    });

    document.getElementById("registrationTable").innerHTML = table;
}