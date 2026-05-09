CREATE DATABASE bookshelf_db;
USE bookshelf_db;

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    author VARCHAR(100),
    price DECIMAL(10,2),
    stock INT
);