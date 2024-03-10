<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charitoo Aire</title>
    <link rel="stylesheet" href="../css/employee-homepage.css">
    <link rel="icon" href="../imgs/company-logo-circle.png">
</head>

<body>
    <nav id="nav-bar">
        <a href="employee-homepage.php"><img src="../imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="employee-homepage.php" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="employee-homepage.php" class="nav-elements nav-text nav-home">Home</a>
            <a href="logout.php" class="nav-elements nav-text">Log Out</a>
        </div>
    </nav>

    <main id="main-section">
        <div class="services-containers">
            <a href="employee-view-bookings.php">
                <div class="services-container">
                    <div class="service">
                        <img src="../imgs/calendar.svg" alt="">
                        <p class="services-text">Calendar</p>
                    </div>
                </div>
            </a>
            
            <div class="services-container">
                <div class="service">
                    <img src="../imgs/work.svg" alt="">
                    <p class="services-text">Work Details</p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>