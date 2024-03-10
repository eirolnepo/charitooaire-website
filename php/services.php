<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="../css/services.css">
    <link rel="icon" href="../imgs/company-logo-circle.png">
</head>
<body>
    <?php if (isset ($_SESSION["user_id"])): ?>
      <nav id="nav-bar">
        <a href="../index.php"><img src="../imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="../index.php" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="../index.php" class="nav-elements nav-text nav-home">Home</a>
            <a href="services.php" class="nav-elements nav-text">Services</a>
            <a href="about-us.php" class="nav-elements nav-text">About Us</a>
            <a href="contact-us.php" class="nav-elements nav-text">Contact Us</a>
            <a href="client-profile.php" class="nav-elements nav-text">Profile</a>
            <a href="logout.php"><button id="sign-in-btn">Sign Out</button></a>
        </div>
      </nav>

      <main>
          <div id="content-container">
              <h2>What we offer?</h2>
              <p class="desc">Charitoo-Aire Airconditioning Corporation is a service company that specializes in providing air conditioning cleaning, repair, installation, and maintenance of air conditioning systems for residential and commercial clients.  We cater to customers anywhere in Laguna and Batangas.</p><br><br>

              <div class="services-containers">
                <a href="cleaning.php">
                  <div class="services-container">
                    <div class="service">
                      <img src="../imgs/cleaning-service.svg" alt="">
                      <h4 class="services-text">Cleaning</h4>
                      <p class="services-text">Our professional cleaners meticulously clean every inch of your air conditioning system.</p>
                    </div>
                  </div>
                </a>
                <a href="repair.php">
                  <div class="services-container">
                    <div class="service">
                        <img src="../imgs/repair.svg" alt="">
                        <h4 class="services-text">Check Up & Repair</h4>
                        <p class="services-text">We address problems like faulty compressors, refrigerant leaks, malfunctioning thermostats, and electrical issues.</p>
                    </div>
                  </div>
                </a>
                <a href="installation.php">
                  <div class="services-container">
                    <div class="service">
                        <img src="../imgs/install.svg" alt="">
                        <h4 class="services-text">Check Up & Installation</h4>
                        <p class="services-text">We develop a customized installation plan and inform you of the necessary steps.</p>
                    </div>
                  </div>
                </a>
                <a href="contact-us.php">
                  <div class="services-container">
                    <div class="service">
                        <img src="../imgs/maintenance.svg" alt="">
                        <h4 class="services-text">Maintenance</h4>
                        <p class="services-text">Our skilled technicians perform routine checks on your air conditioning system.</p>
                      </div>
                  </div>
                </a>
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
              <h2>What we offer?</h2>
              <p class="desc">Charitoo-Aire Airconditioning Corporation is a service company that specializes in providing air conditioning cleaning, repair, installation, and maintenance of air conditioning systems for residential and commercial clients.  We cater to customers anywhere in Laguna and Batangas.</p><br><br>

              <div class="services-containers">
                <a href="cleaning.php">
                  <div class="services-container">
                    <div class="service">
                      <img src="../imgs/cleaning-service.svg" alt="">
                      <h4 class="services-text">Cleaning</h4>
                      <p class="services-text">Our professional cleaners meticulously clean every inch of your air conditioning system.</p>
                    </div>
                  </div>
                </a>
                <a href="repair.php">
                  <div class="services-container">
                    <div class="service">
                        <img src="../imgs/repair.svg" alt="">
                        <h4 class="services-text">Check Up & Repair</h4>
                        <p class="services-text">We address problems like faulty compressors, refrigerant leaks, malfunctioning thermostats, and electrical issues.</p>
                    </div>
                  </div>
                </a>
                <a href="installation.php">
                  <div class="services-container">
                    <div class="service">
                        <img src="../imgs/install.svg" alt="">
                        <h4 class="services-text">Check Up & Installation</h4>
                        <p class="services-text">We develop a customized installation plan and inform you of the necessary steps.</p>
                    </div>
                  </div>
                </a>
                <a href="contact-us.php">
                  <div class="services-container">
                    <div class="service">
                        <img src="../imgs/maintenance.svg" alt="">
                        <h4 class="services-text">Maintenance</h4>
                        <p class="services-text">Our skilled technicians perform routine checks on your air conditioning system.</p>
                      </div>
                  </div>
                </a>
              </div>
      </main>

    <?php endif; ?>
</body>
</html>