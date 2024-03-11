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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <title>All Bookings</title>
</head>
<body>
<?php if (isset ($_SESSION["user_id"])): ?>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>All Bookings</h1>
            <div>
                <a href="client-profile.php" class="btn btn-primary">Back</a> <!--palagay nalang reference para sa profile ng customer -->
            </div>
        </header>

        <?php
        // Check if a date is selected
        $selectedDate = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        ?>

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
                    <th>Time Slot</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                include_once 'book-db.php';
                $user_id = $_SESSION['user_id'];
                // Modify the SQL query to include the selected date
                $result = mysqli_query($mysqli, "SELECT * FROM bookings WHERE id = $user_id");

                if ($result && mysqli_num_rows($result) > 0) {
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
                            <td><?php echo $row["timeslot"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                            <td>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='9'>No results found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</body>
</html>
