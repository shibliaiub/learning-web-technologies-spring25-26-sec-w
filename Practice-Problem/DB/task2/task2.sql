CREATE DATABASE student_records;

USE student_records;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    registration_no VARCHAR(50),
    program VARCHAR(100)
);

INSERT INTO students (name, registration_no, program)
VALUES
('Rahim Uddin', '22-11111-1', 'CSE'),
('Nusrat Jahan', '22-22222-2', 'EEE');