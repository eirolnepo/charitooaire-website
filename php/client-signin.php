<?php

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/client-db.php";
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if($user && password_verify($_POST["psw"], $user["password_hash"])) {
        header("Location: ../signed-in-home.html");
        exit;
    } else {
        echo "document.getElementById('error-message').style.display = 'block';";
    }

    $is_invalid = true;
}