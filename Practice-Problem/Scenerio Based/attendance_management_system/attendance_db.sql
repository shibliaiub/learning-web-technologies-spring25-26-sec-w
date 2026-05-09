CREATE DATABASE attendance_db;
USE attendance_db;

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(100),
    employee_id VARCHAR(20),
    attendance_date DATE,
    status VARCHAR(20)
);