<?php
session_start();
$host = "localhost";
$dbname = "user_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

$user_id = $_SESSION['user_id'];

$user_image = $_FILES['user_image']['tmp_name'];
$target_dir = '../imgs/pfps/'; // Specify your desired directory
$target_file = $target_dir . basename($_FILES['user_image']['name']);

if (move_uploaded_file($user_image, $target_file)) {
    $update_query = "UPDATE user SET profile_img='$target_file' WHERE id=$user_id";
    mysqli_query($conn, $update_query);
    header("Location: client-profile.php");
} else {
    echo "Error uploading profile picture.";
}

mysqli_close($conn);