CREATE DATABASE course_db;
USE course_db;

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100),
    student_id VARCHAR(20),
    course_name VARCHAR(100),
    semester VARCHAR(20)
);