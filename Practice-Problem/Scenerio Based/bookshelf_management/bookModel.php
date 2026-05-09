<?php
function getAllBooks($conn) {
    $sql = "SELECT * FROM books";
    return mysqli_query($conn, $sql);
}

function addBook($conn, $title, $author, $price, $stock) {
    $sql = "INSERT INTO books (title, author, price, stock)
            VALUES ('$title', '$author', '$price', '$stock')";
    return mysqli_query($conn, $sql);
}

function deleteBook($conn, $id) {
    $sql = "DELETE FROM books WHERE id=$id";
    return mysqli_query($conn, $sql);
}
?>