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

        <?php
        // Check if a date is selected
        $selectedDate = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        ?>

        <h2>Bookings for <?php echo $selectedDate; ?></h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Full Address</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Aircon Type</th>
                    <th>Service Type</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'book-db.php';

                // Modify the SQL query to include the selected date
                $result = mysqli_query($mysqli, "SELECT * FROM bookings WHERE date = '$selectedDate'");

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
                            <td><?php echo $row["message"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            <td>
                                <a href="admin-edit-bookings.php?id=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a>
                                
                                <?php
                                // Check if the booking is accepted
                                if ($row["status"] != 'Accepted') {
                                    // Render the "Reject" button with a condition to disable it
                                    ?>
                                    <a href="?action=accept&id=<?php echo $row["id"]; ?>" class="btn btn-success">Accept</a>
                                    <a href="?action=reject&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Reject</a>
                                <?php
                                } else {
                                    // Render a disabled "Reject" button
                                    ?>
                                    <button class="btn btn-danger" disabled>Reject</button>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='9'>No results found</td></tr>";
                }

                // Handle booking status changes
                if (isset($_GET['action']) && in_array($_GET['action'], ['accept', 'reject'])) {
                    $action = $_GET['action'];
                    $bookingId = $_GET['id'];

                    // Update the booking status in the database
                    if ($action == 'accept') {
                        $status = 'Accepted';
                        mysqli_query($mysqli, "UPDATE bookings SET status = '$status' WHERE id = $bookingId");
                    } elseif ($action == 'reject') {
                        // Remove the booking if rejected
                        mysqli_query($mysqli, "DELETE FROM bookings WHERE id = $bookingId");
                    }

                    // Redirect back to the same page after the status update
                    header("Location: admin-view-bookings.php?date=$selectedDate");
                    exit();
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
