<!DOCTYPE html>
<html>
<head>
    <title>Bookshelf Management System</title>
    <script src="ajax.js"></script>
</head>
<body>

<h2>Bookshelf Management System</h2>

<p id="message" style="color:green;"></p>

<form id="bookForm">
    Title:
    <input type="text" name="title" id="title">
    <span id="titleError" style="color:red;"></span>
    <br><br>

    Author:
    <input type="text" name="author" id="author">
    <span id="authorError" style="color:red;"></span>
    <br><br>

    Price:
    <input type="text" name="price" id="price">
    <span id="priceError" style="color:red;"></span>
    <br><br>

    Stock:
    <input type="number" name="stock" id="stock">
    <span id="stockError" style="color:red;"></span>
    <br><br>

    <input type="submit" value="Add Book">
</form>

<hr>

<h3>Book List</h3>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="bookTable"></tbody>
</table>

</body>
</html>