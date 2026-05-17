CREATE DATABASE IF NOT EXISTS hotel_db;
USE hotel_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    nationality VARCHAR(50) NOT NULL,
    role ENUM('guest','admin') DEFAULT 'guest',
    preferred_room_type_id INT NULL,
    special_requests TEXT NULL,
    remember_token VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS room_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price_per_night DECIMAL(10,2) NOT NULL,
    max_capacity INT NOT NULL,
    thumbnail_path VARCHAR(255),
    amenities JSON
);

CREATE TABLE IF NOT EXISTS rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_type_id INT NOT NULL,
    room_number VARCHAR(20) NOT NULL,
    floor INT NOT NULL,
    status ENUM('available','maintenance') DEFAULT 'available'
);

CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    room_id INT NOT NULL,
    checkin_date DATE NOT NULL,
    checkout_date DATE NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    status ENUM('Pending','Confirmed','Checked-In','Checked-Out','Cancelled') DEFAULT 'Pending',
    actual_checkin DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO room_types (name, description, price_per_night, max_capacity, thumbnail_path, amenities)
VALUES
('Standard', 'Comfortable standard room for short stays', 2500.00, 2, '', '["WiFi","AC","TV"]'),
('Deluxe', 'Deluxe room with extra facilities', 4000.00, 3, '', '["WiFi","AC","TV","Mini-bar"]'),
('Suite', 'Luxury suite with premium facilities', 7000.00, 4, '', '["WiFi","AC","TV","Mini-bar","Balcony"]');

INSERT INTO rooms (room_type_id, room_number, floor, status) VALUES
(1, '101', 1, 'available'),
(2, '201', 2, 'available'),
(3, '301', 3, 'available');
