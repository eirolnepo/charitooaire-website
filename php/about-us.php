<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../css/about-us.css">
    <link rel="icon" href="../imgs/company-logo-circle.png">
    <script src="../js/abt-us-script.js"></script>
</head>
<body>
    <?php if (isset ($_SESSION["user_id"])): ?>
        <nav id="nav-bar">
        <a href="../index.html"><img src="../imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="../index.html" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="../index.php" class="nav-elements nav-text">Home</a>
            <a href="services.php" class="nav-elements nav-text">Services</a>
            <a href="about-us.php" class="nav-elements nav-text nav-about">About Us</a>
            <a href="contact-us.php" class="nav-elements nav-text">Contact Us</a>
            <a href="client-profile.php" class="nav-elements nav-text">Profile</a>
            <a href="logout.php"><button id="sign-in-btn">Sign Out</button></a>
        </div>
        </nav>

        <main>
            <div id="main-left">
                <h1>About Us</h1>
                <p>We are a service company that specializes in providing air conditioning cleaning, repair, installation, and maintenance of air conditioning systems for residential and commercial clients. The Company has successfully executed large-scale commercial air conditioning installations for office buildings, shopping malls, and industrial facilities, earning a reputation for reliability and expertise in the industry.
                <br><br>
                CharitooAire office is located at Purok 3, Brgy. Makiling, Calamba, Laguna. It was established in August 2022. It is founded by their president, Joseph E. Villamea.</p>
            </div>
            <div id="main-right">
                <img src="../imgs/company-logo.jpg" alt="logo of the company" id="main-logo">
            </div>
        </main>

        <!-- Slideshow container -->
        <div class="slideshow-container">

        <div class="mySlides fade">
        <div class="numbertext">1 / 7</div>
        <img src="../imgs/abtus-1.jpg" alt="charitooaire employee working" style="width:100%">
        </div>
    
        <div class="mySlides fade">
        <div class="numbertext">2 / 7</div>
        <img src="../imgs/abtus-2.jpg" alt="charitooaire employee working" style="width:100%">
        </div>
    
        <div class="mySlides fade">
        <div class="numbertext">3 / 7</div>
        <img src="../imgs/abtus-3.jpg" alt="charitooaire employee working" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 7</div>
            <img src="../imgs/abtus-4.jpg" alt="charitooaire employee working" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">5 / 7</div>
            <img src="../imgs/abtus-5.jpg" alt="charitooaire employee working" style="width:100%">
        </div>
        
        <div class="mySlides fade">
            <div class="numbertext">6 / 7</div>
            <img src="../imgs/abtus-6.jpg" alt="charitooaire employee working" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">7 / 7</div>
            <img src="../imgs/abtus-7.jpg" alt="charitooaire employee working" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
        <span class="dot" onclick="currentSlide(6)"></span>
        <span class="dot" onclick="currentSlide(7)"></span>
    </div>

    <?php else: ?>
        <nav id="nav-bar">
        <a href="../index.html"><img src="../imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="../index.html" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="../index.php" class="nav-elements nav-text">Home</a>
            <a href="services.php" class="nav-elements nav-text">Services</a>
            <a href="about-us.php" class="nav-elements nav-text nav-about">About Us</a>
            <a href="contact-us.php" class="nav-elements nav-text">Contact Us</a>
            <a href="client-sign-in.php"><button id="sign-in-btn">Sign In</button></a>
        </div>
        </nav>

        <main>
            <div id="main-left">
                <h1>About Us</h1>
                <p>We are a service company that specializes in providing air conditioning cleaning, repair, installation, and maintenance of air conditioning systems for residential and commercial clients. The Company has successfully executed large-scale commercial air conditioning installations for office buildings, shopping malls, and industrial facilities, earning a reputation for reliability and expertise in the industry.
                <br><br>
                CharitooAire office is located at Purok 3, Brgy. Makiling, Calamba, Laguna. It was established in August 2022. It is founded by their president, Joseph E. Villamea.</p>
            </div>
            <div id="main-right">
                <img src="../imgs/company-logo.jpg" alt="logo of the company" id="main-logo">
            </div>
        </main>

        <!-- Slideshow container -->
        <div class="slideshow-container">

        <div class="mySlides fade">
        <div class="numbertext">1 / 7</div>
        <img src="../imgs/abtus-1.jpg" alt="charitooaire employee working" style="width:100%">
        </div>
    
        <div class="mySlides fade">
        <div class="numbertext">2 / 7</div>
        <img src="../imgs/abtus-2.jpg" alt="charitooaire employee working" style="width:100%">
        </div>
    
        <div class="mySlides fade">
        <div class="numbertext">3 / 7</div>
        <img src="../imgs/abtus-3.jpg" alt="charitooaire employee working" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 7</div>
            <img src="../imgs/abtus-4.jpg" alt="charitooaire employee working" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">5 / 7</div>
            <img src="../imgs/abtus-5.jpg" alt="charitooaire employee working" style="width:100%">
        </div>
        
        <div class="mySlides fade">
            <div class="numbertext">6 / 7</div>
            <img src="../imgs/abtus-6.jpg" alt="charitooaire employee working" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">7 / 7</div>
            <img src="../imgs/abtus-7.jpg" alt="charitooaire employee working" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
        <span class="dot" onclick="currentSlide(6)"></span>
        <span class="dot" onclick="currentSlide(7)"></span>
    </div>

    <?php endif; ?>
</body>
</html>