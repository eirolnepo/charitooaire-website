<?php

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/php/database.php";
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if($user) {
        if(password_verify($_POST["psw"], $user["password_hash"])) {
            header("Location: signed-in-home.html");
            exit;
        }
    }

    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charitoo Aire</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imgs/company-logo-circle.png">
    <script src="script.js"></script>
</head>
<body>
    <nav id="nav-bar">
        <a href="index.html"><img src="imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="index.html" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="index.html" class="nav-elements nav-text nav-home">Home</a>
            <a href="#" class="nav-elements nav-text">Services</a>
            <a href="about-us.html" class="nav-elements nav-text">About Us</a>
            <a href="#" class="nav-elements nav-text">Contact Us</a>
            <a href="#"><button id="sign-in-btn" onclick="document.getElementById('sign-in-modal').style.display='block'">Sign In</button></a>
        </div>
    </nav>

    <main id="main-section">
        <h1>Air Conditioning <br>Services</h1>
        <p id="main-quote">"Your breeze of Peace and Comfort"</p><br><br>
        <p id="main-desc">We offer the best assistance <br>for your air conditioning units!</p>
        <a href="#"><button id="inquire-btn">Inquire Now</button></a>
    </main>

    <!-- all modals -->
    <div id="sign-in-modal" class="modal">
    <form class="modal-content animate" method="post">
      <div class="container">
        <span onclick="document.getElementById('sign-in-modal').style.display='none'" class="close" title="Close">×</span>
        <h2 class="text-elements upper-elements sign-in-txt">Sign In</h2>
        <p class="text-elements upper-elements new-user">New user? <a href="#" class="text-elements blue-links" onclick="openSignUpModal()">Create an account</a></p>
        <?php if ($is_invalid) : ?>
            <p style="color: red;">Invalid Login</p>
        <?php endif; ?>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
  
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
  
        <button type="submit">Sign In</button>

        <div id="lower-container">
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            <p><a href="#" class="text-elements blue-links">Forgot password?</a></p>
            <p><a href="#" class="text-elements blue-links" onclick="openNewModal()">Not a customer?</a></p>
        </div>
      </div>
    </form>
    </div>

    <div id="sign-up-modal" class="modal">
      <form class="modal-content animate" action="php/process-signup.php" method="post">
        <div class="container">
          <button id="back-btn" onclick="goBackSignUp()">&lt&ltBack</button>
            <span class="close" onclick="closeSignUpModal()">&times;</span>
          <h2 class="text-elements upper-elements sign-in-txt">Sign Up</h2>
          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Enter Email" name="email" required>

          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="uname" required>
    
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>

          <label for="rppsw"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="rppsw" required>
    
          <button class="both-btn" type="submit">Sign Up</button>
        </div>
      </form>
  </div>

    <div id="not-customer-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <button id="back-btn" onclick="goBack()">&lt&ltBack</button>
        <span onclick="document.getElementById('not-customer-modal').style.display='none'" class="close" title="Close">×</span>
        <div id="btn-container">
            <button class="choice-btn" onclick="openAdminModal()">Admin</button>
            <button class="choice-btn" onclick="openEmployeeModal()">Employee</button>
        </div>
    </div>
    </div>

    <div id="admin-modal" class="modal" style="display: none;">
    <form class="modal-content animate" action="php/admin-signin.php" method="post">
      <div class="container">
        <button id="back-btn" onclick="goBackAdmin()">&lt&ltBack</button>
        <span onclick="document.getElementById('admin-modal').style.display='none'" class="close" title="Close">×</span>
        <h2 class="text-elements upper-elements sign-in-txt">Admin Sign In</h2>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
  
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
  
        <button class="both-btn" type="submit">Sign In</button>
      </div>
    </form>
    </div>

    <div id="employee-modal" class="modal" style="display: none;">
        <form class="modal-content animate" action="php/employee-signin.php" method="post">
          <div class="container">
            <button id="back-btn" onclick="goBackEmployee()">&lt&ltBack</button>
            <span onclick="document.getElementById('employee-modal').style.display='none'" class="close" title="Close">×</span>
            <h2 class="text-elements upper-elements sign-in-txt">Employee Sign In</h2>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
      
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
      
            <button class="both-btn" type="submit">Sign In</button>
          </div>
        </form>
    </div>
</body>
</html>