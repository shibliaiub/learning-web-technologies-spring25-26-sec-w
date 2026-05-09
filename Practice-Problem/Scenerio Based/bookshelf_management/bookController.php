<?php
include "db.php";
include "bookModel.php";

$errors = [];
$message = "";

if (isset($_POST["action"])) {

    if ($_POST["action"] == "add") {
        $title = $_POST["title"];
        $author = $_POST["author"];
        $price = $_POST["price"];
        $stock = $_POST["stock"];

        if (empty($title)) {
            $errors["title"] = "Title is required";
        } elseif (!preg_match("/^[a-zA-Z -]+$/", $title)) {
            $errors["title"] = "Title can contain only letters, spaces and hyphens";
        }

        if (empty($author)) {
            $errors["author"] = "Author is required";
        } elseif (strlen($author) < 3) {
            $errors["author"] = "Author must be at least 3 characters";
        }

        if (empty($price)) {
            $errors["price"] = "Price is required";
        } elseif (!is_numeric($price) || $price <= 0) {
            $errors["price"] = "Price must be numeric and greater than 0";
        }

        if (empty($stock)) {
            $errors["stock"] = "Stock is required";
        } elseif (!filter_var($stock, FILTER_VALIDATE_INT) || $stock < 1) {
            $errors["stock"] = "Stock must be integer and at least 1";
        }

        if (count($errors) == 0) {
            if (addBook($conn, $title, $author, $price, $stock)) {
                $message = "Book added successfully";
            } else {
                $message = "Failed to add book";
            }
        }
    }

    if ($_POST["action"] == "delete") {
        $id = $_POST["id"];

        if (deleteBook($conn, $id)) {
            $message = "Book deleted successfully";
        } else {
            $message = "Failed to delete book";
        }
    }
}

$books = [];
$result = getAllBooks($conn);

while ($row = mysqli_fetch_assoc($result)) {
    $books[] = $row;
}

echo json_encode([
    "errors" => $errors,
    "message" => $message,
    "books" => $books
]);
?>