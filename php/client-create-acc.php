<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/client-sign-in.css">
    <link rel="icon" href="../imgs/company-logo-circle.png">
</head>
<body>
    <main>
        <form id="sign-in-form" method="POST">
            <div id="upper-container">
                <a href="client-sign-in.php"><img src="../imgs/back-btn.svg" id="filter-white"></a>
                <h1>Sign Up</h1>
            </div>
            <div id="inputs">
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" required><br>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required><br>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required><br>
                <label for="rppsw"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="rppsw" required>
            </div>
            <button type="submit">Sign Up</button><br>
        </form>
    </main>
</body>
</html>

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

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

if($stmt->execute()) {
    header("Location: client-sign-in.php");
    exit;
} else {
    if($mysqli->errno === 1062) {
        die("Email already taken");
    }
}

?>