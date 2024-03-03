<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="../css/view-books.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="../imgs/company-logo-circle.png">
</head>
<body>
<nav id="nav-bar">
        <a href="index.php"><img src="../imgs/company-logo-circle.png" alt="logo of charitooaire" id="nav-logo"></a>
        <a href="index.php" class="nav-elements text-reset" id="nav-title">CharitooAire Air Conditioning</a>

        <div id="nav-right">
            <a href="../admin-homepage.html" class="nav-elements nav-text nav-home text-reset">Home</a>
            <a href="../admin-create-account.html" class="nav-elements nav-text text-reset">Create Account</a>
            <a href="view-books.php" class="nav-elements nav-text text-reset">Database</a>
            <a href="bookings.php" class="nav-elements nav-text text-reset">Calendar</a>
            <a href="../index.php" class="nav-elements nav-text text-reset">Log Out</a>
        </div>
    </nav>
<main>
    <div class="accordion" id="accordionPanelsStayOpenExample">

  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
      <div class="page-header clearfix">
                            <h2 class="pull-left">Bookings</h2>
                        </div>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body ">
      <div class="db-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        include_once 'book-db.php';
                        $result = mysqli_query($mysqli,"SELECT * FROM bookings");
                        ?>

                        <?php
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <table class='table table-auto table-bordered table-striped table-hover'>
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
                        </tr>
                        </thead>
                        <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $row["fullName"]; ?></td>
                            <td><?php echo $row["fullAddress"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["contactNum"]; ?></td>
                            <td><?php echo $row["airconType"]; ?></td>
                            <td><?php echo $row["serviceType"]; ?></td>
                            <td><?php echo $row["message"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                        </tr>
                        </tbody>
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
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
      <div class="page-header clearfix">
                            <h2 class="pull-left">Users</h2>
                        </div>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
      <div class="db-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        include_once 'client-db.php';
                        $result = mysqli_query($mysqli,"SELECT * FROM user");
                        ?>

                        <?php
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <table class='table table-bordered table-striped table-hover'>
                        <thead>
                        <tr>
                            <th>Full Name</th>
                            
                            <th>Email</th>
                            <th>Password</th>
                        </tr>
                        </thead>
                        <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $row["name"]; ?></td>
                            
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["password_hash"]; ?></td>
                        </tr>
                        </tbody>
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
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
      <div class="page-header clearfix">
                            <h2 class="pull-left">Employees</h2>
                        </div>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
      <div class="db-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        include_once 'employees-db.php';
                        $result = mysqli_query($mysqli,"SELECT * FROM employees");
                        ?>

                        <?php
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <table class='table table-bordered table-striped table-hover'>
                        <thead>
                        <tr>
                            <td>Full Name</td>
                            <td>Email</td>
                            <td>Password</td>
                        </tr>
                        </thead>
                        <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["password_hash"]; ?></td>
                        </tr>
                        </tbody>
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
      </div>
    </div>
  </div>
</div>
    </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>