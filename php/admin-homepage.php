<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charitoo Aire</title>
    <link rel="stylesheet" href="../css/admin-homepage.css">
    <link rel="icon" href="../imgs/company-logo-circle.png">
</head>

<body>
    <nav id="nav-bar">
        <a href="admin-homepage.php"><img src="../imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="admin-homepage.php" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="admin-homepage.php" class="nav-elements nav-text nav-home">Home</a>
            <a href="admin-create-account.php" class="nav-elements nav-text">Create Account</a>
            <a href="view-books.php" class="nav-elements nav-text">Database</a>
            <a href="admin-view-bookings.php" class="nav-elements nav-text">Calendar</a>
            <a href="logout.php" class="nav-elements nav-text">Log Out</a>
        </div>
    </nav>

    <main id="main-section">
        <h1>Air Conditioning <br>Services</h1>
        <p id="main-quote">"Your breeze of Peace and Comfort"</p><br><br>
        <p id="main-desc">We offer the best assistance <br>for your air conditioning units!</p>
    </main>
</body>

</html>