<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <title>Edit Bookings</title>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Member</h1>
            <div>
                <a href="admin-view-bookings.php" class="btn btn-primary">Back</a>
            </div>
        </header>
    

    <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Full Address</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Aircon Type</th>
                    <th>Service Type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 include_once 'book-db.php';
               //may iinsert pa ako dito para yung data lang sa mismong date yung lalabas
                 $result = mysqli_query($mysqli,"SELECT * FROM bookings");
                 ?>
                 <?php
                 if (mysqli_num_rows($result) > 0) {
                     $row = mysqli_fetch_array($result)
                    ?>
                    <tr>
                        <td>
                            <?php echo $row["fullName"]; ?>
                        </td>
                        <td>
                            <?php echo $row["fullAddress"]; ?>
                        </td>
                        <td>
                            <?php echo $row["email"]; ?>
                        </td>
                        <td>
                            <?php echo $row["contactNum"]; ?>
                        </td>
                        <td>
                            <?php echo $row["airconType"]; ?>
                        </td>
                        <td>
                            <?php echo $row["serviceType"]; ?>
                        </td>
                        <td>
                            <a href="admin-edit-bookings.php?id=<?php echo $row["id"]; ?>" class="btn btn-info ">Edit</a>
                            <a href="#?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
    </div>
</body>
</html>