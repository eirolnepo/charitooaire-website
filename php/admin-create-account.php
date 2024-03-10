<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../css/admin-create-account.css">
    <link rel="icon" href="../imgs/company-logo-circle.png">
</head>

<body>
    <nav id="nav-bar">
        <a href="admin-create-account.php"><img src="../imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="admin-create-account.php" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="admin-homepage.php" class="nav-elements nav-text nav-home">Home</a>
            <a href="admin-create-account.php" class="nav-elements nav-text">Create Account</a>
            <a href="view-books.php" class="nav-elements nav-text">Database</a>
            <a href="admin-view-bookings.php" class="nav-elements nav-text">Calendar</a>
            <a href="../index.php" class="nav-elements nav-text">Log Out</a>
        </div>
    </nav>
    
    <main>
        <div class="form-container">
            <div class="containerAdmin">
                <h2>Employee Account</h2>
                <form class="form-login" action="php/employee-create-acc.php" method="post">
                    <input placeholder="Email" type="email" name="email" id="email" class="input" required>
                    <input placeholder="Username" type="text" name="uname" id="username" class="input" required>
                    <input placeholder="Password" type="password" name="psw" id="password" class="input" required>
                    <input placeholder="Confirm Password" type="password" name="rppsw" id="confirm-password" class="input" required>
                    <input value="Create Account" type="submit" class="form-login login-button">
                </form>
            </div>
        </div>
    </main>
</body>

</html>