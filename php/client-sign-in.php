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
        session_start();
        $_SESSION["user_id"] = $user["id"];
        header("Location: ../index.php");
        exit;
    }

    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../css/client-sign-in.css">
    <link rel="icon" href="../imgs/company-logo-circle.png">
</head>
<body>
    <main>
        <form id="sign-in-form" method="POST">
            <div id="upper-container">
                <a href="../index.php"><img src="../imgs/back-btn.svg" id="filter-white"></a>
                <h1>Sign In</h1>
                <p class="new-user-txt">New user?<span> </span><a href="client-create-acc.php" class="new-user-txt">Create an account</a></p>
            </div>
            <div id="inputs">
                <?php if ($is_invalid): ?>
                    <p>Invalid login</p>
                <?php endif; ?>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required><br>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            </div>
            <button type="submit">Sign In</button><br>
            <a href="../not-a-customer.html">Not a customer?</a>
        </form>
    </main>
</body>
</html>