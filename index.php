<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charitoo Aire</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imgs/company-logo-circle.png">
</head>
<body>
    <?php if (isset ($_SESSION["user_id"])): ?>
      <nav id="nav-bar">
        <a href="index.php"><img src="imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="index.php" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
          <a href="index.php" class="nav-elements nav-text">Home</a>
          <a href="php/services.php" class="nav-elements nav-text">Services</a>
          <a href="php/about-us.php" class="nav-elements nav-text nav-about">About Us</a>
          <a href="php/contact-us.php" class="nav-elements nav-text">Contact Us</a>
          <a href="php/client-profile.php" class="nav-elements nav-text">Profile</a>
          <a href="php/logout.php"><button id="sign-in-btn">Sign Out</button></a>
        </div>
      </nav>

      <main id="main-section">
        <div>
          <h1>Air Conditioning <br>Services</h1>
          <p id="main-quote">"Your breeze of Peace and Comfort"</p><br><br>
          <p id="main-desc">We offer the best assistance <br>for your air conditioning units!</p>
          <a href="php/services.php"><button id="inquire-btn">Inquire Now</button></a>
        </div>
      </main>

    <?php else: ?>
      <nav id="nav-bar">
        <a href="index.php"><img src="imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="index.php" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="index.php" class="nav-elements nav-text nav-home">Home</a>
            <a href="php/services.php" class="nav-elements nav-text">Services</a>
            <a href="php/about-us.php" class="nav-elements nav-text">About Us</a>
            <a href="php/contact-us.php" class="nav-elements nav-text">Contact Us</a>
            <a href="php/client-sign-in.php"><button id="sign-in-btn">Sign In</button></a>
        </div>
      </nav>

      <main id="main-section">
        <div id="content-container">
          <h1>Air Conditioning <br>Services</h1>
          <p id="main-quote">"Your breeze of Peace and Comfort"</p><br><br>
          <p id="main-desc">We offer the best assistance <br>for your air conditioning units!</p>
          <a href="php/services.php"><button id="inquire-btn">Inquire Now</button></a>
        </div>
      </main>

    <?php endif; ?>
</body>
</html>