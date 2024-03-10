<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <title>Edit Bookings</title>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Member</h1>
            <div>
                <a href="employee-view-bookings.php" class="btn btn-primary">Back</a>
            </div>
        </header>

        
        <form method="GET" action="">
            <label for="search">Search:</label>
            <input type="text" name="search" id="search" placeholder="Enter search term">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

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

                // Check if search parameter is present
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $result = mysqli_query($mysqli, "SELECT * FROM bookings WHERE 
                        fullName LIKE '%$search%' OR
                        fullAddress LIKE '%$search%' OR
                        email LIKE '%$search%' OR
                        contactNum LIKE '%$search%' OR
                        airconType LIKE '%$search%' OR
                        serviceType LIKE '%$search%'");
                } else {
                    // Default query without search
                    $result = mysqli_query($mysqli, "SELECT * FROM bookings");
                }

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["fullName"]; ?></td>
                            <td><?php echo $row["fullAddress"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["contactNum"]; ?></td>
                            <td><?php echo $row["airconType"]; ?></td>
                            <td><?php echo $row["serviceType"]; ?></td>
                            <td><a href="#?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='7'>No results found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
