<?php

if (isset($_GET['date'])) {
  $date = $_GET['date'];
}


//for date of bookings
if(isset($_POST["submit"])){
    $name = $_POST["fname"];
    $address = $_POST["faddress"];
    $email = $_POST["email"];
    $number = $_POST["connumber"];
    $aircontype = $_POST["aircontype"];
    $servicetype = $_POST["servicetype"];
    $message = $_POST["message"];
    $mysqli = new mysqli('localhost', 'root', '', 'book_db');
    $stmt = $mysqli->prepare("INSERT INTO bookings (fullName, fullAddress, email, contactNum, airconType, serviceType, message, date)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssissss', $name, $address, $email, $number, $aircontype, $servicetype, $message, $date);
    $stmt->execute();
    $msg = "<div class='alert alert-success role='alert'>Booking Successful!</div>";
    $stmt->close();
    $mysqli->close();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  </head>

  <body>
    <button id="back-btn"><a href="bookings.php">&lt&ltBack</a></button>
    <div class="container">
        <h1 class="text-center">Book a Service for <?php echo date('F j, Y', strtotime($date)); ?></h1><hr><br>
        
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <?php echo isset($msg)?$msg:''; ?>
                <form action="" method="post">
                    <input type="text" placeholder="Full Name" name="fname" required>
                    <input type="text" placeholder="Full Address" name="faddress" required>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="number" placeholder="Contact Number" name="connumber" required>
                    <select name="aircontype" id="aircontype" required>
                        <option value="" disabled selected>Select Air Con Type</option>
                        <option value="Window Aircon">Window Air Conditioners</option>
                        <option value="Split Aircon">Split Air Conditioners</option>
                        <option value="Central Aircon">Central Air Conditioners</option>
                        <option value="Hybrid Aircon">Hybrid Air Conditioners</option>
                    </select>
                    <select name="servicetype" id="servicetype" required>
                        <option value="" disabled selected>Select Type of Service</option>
                        <option value="Cleaning">Cleaning</option>
                        <option value="Repair">Repair</option>
                        <option value="Installation">Installation</option>
                        <option value="Maintenance">Maintenance</option>
                    </select>
                    <textarea placeholder="Leave a message to specify your concerns" id="message" name="message" rows="4" cols="50" style="resize: none;"></textarea>
                    <p>We look forward to providing you with the best air conditioning service!</p>
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
  </body>

</html>