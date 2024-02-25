<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="../css/view-books.css">
    <link rel="icon" href="../imgs/company-logo-circle.png">
</head>
<body>
<nav id="nav-bar">
        <a href="index.php"><img src="../imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="index.php" class="nav-elements" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="../admin-homepage.html" class="nav-elements nav-text nav-home">Home</a>
            <a href="../admin-create-account.html" class="nav-elements nav-text">Create Account</a>
            <a href="view-books.php" class="nav-elements nav-text">Database</a>
            <a href="bookings.php" class="nav-elements nav-text">Calendar</a>
            <a href="index.php" class="nav-elements nav-text">Log Out</a>
        </div>
    </nav>

    <main>
        <div class="db-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                            <h2 class="pull-left">Bookings</h2>
                        </div>
                        <?php
                        include_once 'book-db.php';
                        $result = mysqli_query($mysqli,"SELECT * FROM bookings");
                        ?>

                        <?php
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <table class='table table-bordered table-striped'>
                        
                        <tr>
                            <td>Full Name</td>
                            <td>Full Address</td>
                            <td>Email</td>
                            <td>Contact Number</td>
                            <td>Aircon Type</td>
                            <td>Service Type</td>
                            <td>Message</td>
                        </tr>
                        <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["fullName"]; ?></td>
                            <td><?php echo $row["fullAddress"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["contactNum"]; ?></td>
                            <td><?php echo $row["airconType"]; ?></td>
                            <td><?php echo $row["serviceType"]; ?></td>
                            <td><?php echo $row["message"]; ?></td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                        </table>
                        <?php
                        }
                        else{
                            echo "No result found";
                        }
                        ?>
                    </div>
                </div>        
            </div>
        </div>
    </main>
</body>
</html>