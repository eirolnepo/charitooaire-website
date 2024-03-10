<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleaning Prices</title>
    <link rel="stylesheet" href="../css/cleaning.css">
    <link rel="icon" href="../imgs/company-logo-circle.png">
</head>
<body>
    <?php if (isset ($_SESSION["user_id"])): ?>
        <nav id="nav-bar">
        <a href="../index.php"><img src="../imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="../index.php" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="../index.php" class="nav-elements nav-text">Home</a>
            <a href="services.php" class="nav-elements nav-text">Services</a>
            <a href="about-us.php" class="nav-elements nav-text nav-about">About Us</a>
            <a href="contact-us.php" class="nav-elements nav-text">Contact Us</a>
            <a href="logout.php"><button id="sign-in-btn">Sign Out</button></a>
        </div>
    </nav>

    <main>
        <div id="content-container">
            <h2>Cleaning Prices</h2>
            <div class="aircontype-containers">
                <a href="bookings.php?service=cleaning&aircon=wallmounted">
                    <div class="aircontype-container">
                        <div class="service">
                            <img src="../imgs/wall mounted.png" alt="">
                            <h4 class="text">Wall Mounted</h4>
                            <p class="text">P 1,000.00</p>
                        </div>
                    </div>
                </a>
                <a href="bookings.php?service=cleaning&aircon=windowtype">
                    <div class="aircontype-container">
                        <div class="service">
                            <img src="../imgs/window type.png" alt="">
                            <h4 class="text">Window type</h4>
                            <p class="text">P 500.00</p>
                        </div>
                    </div>
                </a>
                <a href="bookings.php?service=cleaning&aircon=floormounted">
                    <div class="aircontype-container">
                        <div class="service">
                            <img src="../imgs/floor mounted.png" alt="">
                            <h4 class="text">Floor Mounted</h4>
                            <p class="text">P 1,500.00</p>
                        </div>
                    </div>
                </a>
                <a href="bookings.php?service=cleaning&aircon=ceillingcassette">
                    <div class="aircontype-container">
                        <div class="service">
                            <img src="../imgs/ceiling cassette.png" alt="">
                            <h4 class="text">Ceiling Cassette</h4>
                            <p class="text">P 2,500.00</p>
                        </div>
                    </div>
                </a>
                <a href="bookings.php?service=cleaning&aircon=ceillingsuspended">
                    <div class="aircontype-container">
                        <div class="service">
                            <img class="ceilingsus" src="../imgs/ceiling sus.png" alt="">
                            <h4 class="text">Ceiling Suspended</h4>
                            <p class="text">P 2,000.00</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
    
    <?php else: ?>
        <nav id="nav-bar">
        <a href="../index.php"><img src="../imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="../index.php" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="../index.php" class="nav-elements nav-text nav-home">Home</a>
            <a href="services.php" class="nav-elements nav-text">Services</a>
            <a href="about-us.php" class="nav-elements nav-text">About Us</a>
            <a href="contact-us.php" class="nav-elements nav-text">Contact Us</a>
            <a href="client-sign-in.php"><button id="sign-in-btn">Sign In</button></a>
        </div>
        </nav>

        <main>
        <div id="content-container">
            <h2>Cleaning Prices</h2>
            <div class="aircontype-containers">
                <a href="client-sign-in.php">
                    <div class="aircontype-container">
                        <div class="service">
                            <img src="../imgs/wall mounted.png" alt="">
                            <h4 class="text">Wall Mounted</h4>
                            <p class="text">P 1,000.00</p>
                        </div>
                    </div>
                </a>
                <a href="client-sign-in.php">
                    <div class="aircontype-container">
                        <div class="service">
                            <img src="../imgs/window type.png" alt="">
                            <h4 class="text">Window type</h4>
                            <p class="text">P 500.00</p>
                        </div>
                    </div>
                </a>
                <a href="client-sign-in.php">
                    <div class="aircontype-container">
                        <div class="service">
                            <img src="../imgs/floor mounted.png" alt="">
                            <h4 class="text">Floor Mounted</h4>
                            <p class="text">P 1,500.00</p>
                        </div>
                    </div>
                </a>
                <a href="client-sign-in.php">
                    <div class="aircontype-container">
                        <div class="service">
                            <img src="../imgs/ceiling cassette.png" alt="">
                            <h4 class="text">Ceiling Cassette</h4>
                            <p class="text">P 2,500.00</p>
                        </div>
                    </div>
                </a>
                <a href="client-sign-in.php">
                    <div class="aircontype-container">
                        <div class="service">
                            <img class="ceilingsus" src="../imgs/ceiling sus.png" alt="">
                            <h4 class="text">Ceiling Suspended</h4>
                            <p class="text">P 2,000.00</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <?php endif; ?>
</body>
</html>