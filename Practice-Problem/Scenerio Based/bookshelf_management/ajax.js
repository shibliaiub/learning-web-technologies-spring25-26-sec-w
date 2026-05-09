window.onload = function () {
    loadBooks();

    document.getElementById("bookForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append("action", "add");

        fetch("bookController.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            showResponse(data);
        });
    });
};

function loadBooks() {
    let formData = new FormData();
    formData.append("action", "load");

    fetch("bookController.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        showResponse(data);
    });
}

function deleteBook(id) {
    let formData = new FormData();
    formData.append("action", "delete");
    formData.append("id", id);

    fetch("bookController.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        showResponse(data);
    });
}

function showResponse(data) {
    document.getElementById("titleError").innerHTML = data.errors.title || "";
    document.getElementById("authorError").innerHTML = data.errors.author || "";
    document.getElementById("priceError").innerHTML = data.errors.price || "";
    document.getElementById("stockError").innerHTML = data.errors.stock || "";
    document.getElementById("message").innerHTML = data.message || "";

    let table = "";

    data.books.forEach(book => {
        table += `
            <tr>
                <td>${book.id}</td>
                <td>${book.title}</td>
                <td>${book.author}</td>
                <td>${book.price}</td>
                <td>${book.stock}</td>
                <td><button onclick="deleteBook(${book.id})">Delete</button></td>
            </tr>
        `;
    });

    document.getElementById("bookTable").innerHTML = table;
}