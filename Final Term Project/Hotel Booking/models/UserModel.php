<?php
function createUser($conn, $name, $email, $passwordHash, $phone, $nationality) {
    $role = "guest";
    $sql = "INSERT INTO users (name, email, password_hash, phone, nationality, role) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $passwordHash, $phone, $nationality, $role);
    return mysqli_stmt_execute($stmt);
}

function getUserByEmail($conn, $email) {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function getUserById($conn, $id) {
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function updateRememberToken($conn, $id, $hashedToken) {
    $sql = "UPDATE users SET remember_token = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $hashedToken, $id);
    return mysqli_stmt_execute($stmt);
}

function getUserByRememberToken($conn, $hashedToken) {
    $sql = "SELECT * FROM users WHERE remember_token = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $hashedToken);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function updateProfile($conn, $id, $name, $email, $phone, $nationality, $preferredRoomTypeId, $specialRequests) {
    if ($preferredRoomTypeId === "" || $preferredRoomTypeId === null) {
        $preferredRoomTypeId = null;
    }
    $sql = "UPDATE users SET name = ?, email = ?, phone = ?, nationality = ?, preferred_room_type_id = ?, special_requests = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssisi", $name, $email, $phone, $nationality, $preferredRoomTypeId, $specialRequests, $id);
    return mysqli_stmt_execute($stmt);
}

function getAllRoomTypes($conn) {
    return mysqli_query($conn, "SELECT id, name FROM room_types ORDER BY name ASC");
}

function getUpcomingBooking($conn, $userId) {
    $sql = "SELECT b.id, b.checkin_date, b.checkout_date, b.status, rt.name AS room_type_name
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
            JOIN room_types rt ON r.room_type_id = rt.id
            WHERE b.user_id = ?
              AND b.checkin_date >= CURDATE()
              AND b.status NOT IN ('Cancelled', 'Checked-Out')
            ORDER BY b.checkin_date ASC
            LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}
?>
