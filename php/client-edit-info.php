<?php
session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/client-sign-in.css">
    <link rel="icon" href="../imgs/company-logo-circle.png">
</head>
<body>
<main>
    <form id="sign-in-form" action="client-edit-process.php" method="POST">
        <div id="upper-container">
            <a href="client-profile.php"><img src="../imgs/back-btn.svg" id="filter-white"></a>
            <h1>Edit Information</h1>
        </div>
        <div id="inputs">
            <label for="name"><b>Full Name</b></label>
            <input type="text" placeholder="Edit Full Name" name="name" required><br>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Edit Email" name="email" ><br>
            <label for="address"><b>Full Address</b></label>
            <input type="text" placeholder="Edit Full Address" name="address" ><br>
            <label for="contnum"><b>Contact Number</b></label>
            <input type="number" placeholder="Edit Contact Number" name="contnum" ><br>
        </div>
        <button type="submit">Save</button><br>
    </form>
    </main>
</body>
</html>