<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/employees-db.php";
    $sql = sprintf("SELECT * FROM employees
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["psw"], $user["password_hash"])) {
            header("Location: ../employee-homepage.html");
            exit;
        }
    }
}
?>