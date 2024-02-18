<?php
$mysqli = require __DIR__ . "/book-db.php";

$sql = "INSERT INTO bookings (fullName, fullAddress, email, contactNum, airconType, serviceType, message)
VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->stmt_init();
if(!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
$stmt->bind_param("sssisss", $_POST["fname"], $_POST["faddress"], $_POST["email"], $_POST["connumber"], $_POST["aircontype"], $_POST["servicetype"], $_POST["message"]);

if ($stmt->execute()) {
    header("Location: bookings.php");
    exit;
} else {
    echo 'Error: ' . $stmt->error;
}