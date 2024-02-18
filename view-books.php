<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<button id="back-btn"><a href="admin-homepage.html">&lt&ltBack</a></button>
<div class="bs-example">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Bookings</h2>
                    </div>
                    <?php
                    include_once 'php\book-db.php';
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
</body>
</html>