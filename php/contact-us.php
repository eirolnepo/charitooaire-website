<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/contact-us.css">
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
            <a href="logout.php"><button id="sign-in-btn">Sign Out</button></a>
        </div>
        </nav>

        <main>
            <h2>Get in touch with us!</h2>
            <div class="services-containers">
                <div class="services-container">
                    <a href="https://www.facebook.com/charitooaire?mibextid=ZbWKwL"><div class="service">
                        <img src="../imgs/fb.svg" alt="">
                    </div></a>
                </div>
                <div class="services-container">
                  <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.tiktok.com%2F%40charitoo.aire%3F_t%3D8kFj3BYdxon%26_r%3D1%26fbclid%3DIwAR0uMR2a3YCJTaEMhSbUQNXbpmZ9MLLcn1nJR1Y90DMt1GIBet81ot8ud6s&h=AT3dT117dbvmEvThtgRr1U0KSphShxFKM1qGIEeooyrzP8ZiBEZsaBaDi8J6ThJhisrC8VboV3xRUCcFm2k_7YsQes5oDWirnzsTqKQ3AICrk62utgOoxhYESIzAajqcPF_-etZGvVrv9-CykhOrmg"><div class="service">
                        <img src="../imgs/tiktok.svg" alt="">
                    </div></a>
                </div>
                <div class="services-container">
                  <a href="#"><div class="service">
                        <img src="../imgs/phone-solid.svg" alt="">
                    </div></a>
                </div>
                <div class="services-container">
                  <a href="#"><div class="service">
                        <img src="../imgs/location.svg" alt="">
                    </div></a>
                </div>
            </div>

            <footer class="copyright"> 
              <h3>Copyright &#169 Charitoo-Aire Air Conditioning Services 2024, All rights reserved.</h3>
            </footer>
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
          <h2>Get in touch with us!</h2>
          <div class="services-containers">
              <div class="services-container">
                  <a href="https://www.facebook.com/charitooaire?mibextid=ZbWKwL"><div class="service">
                      <img src="../imgs/fb.svg" alt="">
                  </div></a>
              </div>
              <div class="services-container">
                <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.tiktok.com%2F%40charitoo.aire%3F_t%3D8kFj3BYdxon%26_r%3D1%26fbclid%3DIwAR0uMR2a3YCJTaEMhSbUQNXbpmZ9MLLcn1nJR1Y90DMt1GIBet81ot8ud6s&h=AT3dT117dbvmEvThtgRr1U0KSphShxFKM1qGIEeooyrzP8ZiBEZsaBaDi8J6ThJhisrC8VboV3xRUCcFm2k_7YsQes5oDWirnzsTqKQ3AICrk62utgOoxhYESIzAajqcPF_-etZGvVrv9-CykhOrmg"><div class="service">
                      <img src="../imgs/tiktok.svg" alt="">
                  </div></a>
              </div>
              <div class="services-container">
                <a href="#"><div class="service">
                      <img src="../imgs/phone-solid.svg" alt="">
                  </div></a>
              </div>
              <div class="services-container">
                <a href="#"><div class="service">
                      <img src="../imgs/location.svg" alt="">
                  </div></a>
              </div>
          </div>

          <footer class="copyright"> 
            <h3>Copyright &#169 Charitoo-Aire Air Conditioning Services 2024, All rights reserved.</h3>
          </footer>
      </main>
    <?php endif; ?>
</body>
</html>