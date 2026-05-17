<?php
session_start();
include "_remember.php";
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
$userId = $_SESSION["user_id"];
$userResult = getUserById($conn, $userId);
$user = mysqli_fetch_assoc($userResult);
$roomTypes = getAllRoomTypes($conn);
$bookingResult = getUpcomingBooking($conn, $userId);
$upcomingBooking = mysqli_fetch_assoc($bookingResult);
$subscribeChecked = isset($_COOKIE["subscribe_offers"]) ? "checked" : "";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guest Profile</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <script src="../public/assets/js/validation.js"></script>
</head>
<body>
<div class="container wide">
    <h2>Guest Profile</h2>
    <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION["name"]); ?></strong></p>
    <a class="logout" href="logout.php">Logout</a>
    <?php
    if (isset($_SESSION["success"])) {
        echo "<p class='success'>" . $_SESSION["success"] . "</p>";
        unset($_SESSION["success"]);
    }
    if (isset($_SESSION["error"])) {
        echo "<p class='error'>" . $_SESSION["error"] . "</p>";
        unset($_SESSION["error"]);
    }
    ?>
    <h3>Edit Profile & Preferences</h3>
    <form method="post" action="../controllers/AuthController.php" onsubmit="return validateProfileForm()">
        <input type="hidden" name="action" value="update_profile">
        <label>Name</label>
        <input type="text" name="name" id="profileName" value="<?php echo htmlspecialchars($user['name']); ?>">
        <span id="profileNameError" class="error"></span>
        <label>Email</label>
        <input type="email" name="email" id="profileEmail" value="<?php echo htmlspecialchars($user['email']); ?>">
        <span id="profileEmailError" class="error"></span>
        <label>Phone</label>
        <input type="text" name="phone" id="profilePhone" value="<?php echo htmlspecialchars($user['phone']); ?>">
        <span id="profilePhoneError" class="error"></span>
        <label>Nationality</label>
        <input type="text" name="nationality" id="profileNationality" value="<?php echo htmlspecialchars($user['nationality']); ?>">
        <span id="profileNationalityError" class="error"></span>
        <label>Preferred Room Type</label>
        <select name="preferred_room_type_id">
            <option value="">Select Room Type</option>
            <?php while ($room = mysqli_fetch_assoc($roomTypes)) { ?>
                <option value="<?php echo $room['id']; ?>" <?php if ($user["preferred_room_type_id"] == $room["id"]) echo "selected"; ?>>
                    <?php echo htmlspecialchars($room["name"]); ?>
                </option>
            <?php } ?>
        </select>
        <label>Special Requests</label>
        <textarea name="special_requests"><?php echo htmlspecialchars($user["special_requests"] ?? ""); ?></textarea>
        <label class="inline"><input type="checkbox" name="subscribe_offers" value="1" <?php echo $subscribeChecked; ?>> Subscribe to offers</label>
        <button type="submit">Update Profile</button>
    </form>
    <hr>
    <h3>Upcoming Booking Summary</h3>
    <?php if ($upcomingBooking) { ?>
        <div class="card">
            <p><strong>Room Type:</strong> <?php echo htmlspecialchars($upcomingBooking["room_type_name"]); ?></p>
            <p><strong>Check-in:</strong> <?php echo htmlspecialchars($upcomingBooking["checkin_date"]); ?></p>
            <p><strong>Check-out:</strong> <?php echo htmlspecialchars($upcomingBooking["checkout_date"]); ?></p>
            <p><strong>Status:</strong> <span class="badge"><?php echo htmlspecialchars($upcomingBooking["status"]); ?></span></p>
        </div>
    <?php } else { ?>
        <div class="card"><p>No upcoming stays.</p></div>
    <?php } ?>
</div>
</body>
</html>
