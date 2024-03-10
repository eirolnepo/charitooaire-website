<?php
session_start();
$host = "localhost";
$dbname = "user_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$contnum = mysqli_real_escape_string($conn, $_POST['contnum']);

$user_id = $_SESSION['user_id'];
$update_query = "UPDATE user SET name='$name',
                                 email='$email',
                                 address='$address',
                                 contnum='$contnum' WHERE id=$user_id";

if (mysqli_query($conn, $update_query)) {
    header("Location: client-profile.php");
} else {
    echo "Error updating profile: " . mysqli_error($conn);
}

mysqli_close($conn);