<?php

$date = isset($_GET['date']) ? $_GET['date'] : date('F j, Y');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  </head>

  <body>
    <button id="back-btn"><a href="bookings.php">&lt&ltBack</a></button>
    <div class="container">
        <h1 class="text-center">Book a Service for <?php echo date('F j, Y', strtotime($date)); ?></h1><hr><br>
        
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <?php echo isset($msg)?$msg:''; ?>
                <form action="php/process-booking.php" method="post">
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
  </body>

</html>