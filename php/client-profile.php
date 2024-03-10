<?php
session_start();
$mysqli = require __DIR__ . "/client-db.php";
$sessionId = $_SESSION["user_id"];
$sql = sprintf("SELECT * FROM user WHERE id = $sessionId");
$result = $mysqli->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/client-profile.css">
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
            <a href="client-profile.php" class="nav-elements nav-text">Profile</a>
            <a href="logout.php"><button id="sign-in-btn">Sign Out</button></a>
        </div>
    </nav>

    <main>
        <div id="main-container">
            <form action="upload.php" method="post" enctype="multipart/form-data" id="img-container">
                <?php
                $host = "localhost";
                $dbname = "user_db";
                $username = "root";
                $password = "";
                
                $conn = mysqli_connect($host, $username, $password, $dbname);

                $user_id = $_SESSION['user_id'];

                $query = "SELECT profile_img FROM user WHERE id = $user_id";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $profile_img_path = $row['profile_img'];

                if (!empty($profile_img_path)) {
                    echo '<img src="' . $profile_img_path . '" alt="Profile Picture" id="pfp">';
                } else {
                    echo 'No profile picture available.';
                }
                ?>
                <input type="file" id="fileInput" name="user_image" accept="image/*" style="display: none;">
                <br><button type="button" onclick="document.getElementById('fileInput').click();" id="upload-btn">Upload</button>
                <!-- <input type="submit" value="Upload"> -->
            </form>
            <div id="info-container">
                <p>Full Name</p>
                <p class="values"><?php echo $user["name"]; ?></p>
                <p>Email</p>
                <p class="values"><?php echo $user["email"]; ?></p>
                <p>Address</p>
                <p class="values"><?php echo $user["address"]; ?></p>
                <p>Contact Number</p>
                <p class="values"><?php echo $user["contnum"]; ?></p>
                <a href="client-edit-info.php" class="smalltext">Edit Information</a>
            </div>
        </div>

        <script>
            // Automatically submit the form when a file is selected
            document.getElementById('fileInput').addEventListener('change', function() {
            document.getElementById('img-container').submit();
        });
</script>
    </main>
    <?php endif; ?>
</body>
</html>