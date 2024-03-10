<?php

// server-side validation
if (empty($_POST["name"])) {
    die("Name is required");
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if ($_POST["psw"] !== $_POST["rppsw"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["psw"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ ."/client-db.php";

$sql = "INSERT INTO user (name, email, address, contnum, password_hash)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssss", $_POST["name"], $_POST["email"], $_POST["address"], $_POST["contnum"], $password_hash);

if($stmt->execute()) {
    header("Location: client-sign-in.php");
    exit;
} else {
    if($mysqli->errno === 1062) {
        die("Email already taken");
    }
}