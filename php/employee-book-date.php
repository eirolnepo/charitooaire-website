<?php

$mysqli = new mysqli('localhost', 'root', '', 'book_db');
if (isset($_GET['date'])) {
  $date = $_GET['date'];
  $stmt = $mysqli->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }
            
            $stmt->close();
         }
        }
}


//for date of bookings
if(isset($_POST["submit"])){
    $name = $_POST["fname"];
    $address = $_POST["faddress"];
    $email = $_POST["email"];
    $number = $_POST["connumber"];
    $aircontype = $_POST["aircon"];
    $servicetype = $_POST["service"];
    $message = $_POST["message"];
    $timeslot = $_POST["timeslot"];
    $stmt = $mysqli->prepare("select * from bookings where date = ? AND timeslot = ?");
    $stmt->bind_param('ss', $date, $timeslot);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
           
          $msg = "<div class='alert alert-danger role='alert' style='width:47%;text-align:left;margin-left:0'>Already Booked</div>";
           
        } else {
          $stmt = $mysqli->prepare("INSERT INTO bookings (fullName, fullAddress, email, contactNum, airconType, serviceType, message, date, timeslot)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param('sssisssss', $name, $address, $email, $number, $aircontype, $servicetype, $message, $date, $timeslot);
          $stmt->execute();
          $msg = "<div class='alert alert-success role='alert' style='width:48%;text-align:left;margin-left:0'>Booking subject for approval!</div>";
          $bookings[]= $timeslot;
          $stmt->close();
          $mysqli->close();
        }
}
}

$duration = 120;
$cleanup = 0;
$start = "07:00";
$end = "16:00";


function timeslot($duration, $cleanup, $start, $end){
  $start = new DateTime($start);
  $end = new DateTime($end);
  $interval = new DateInterval("PT".$duration."M");
  $cleanupInterval = new DateInterval("PT".$cleanup."M");
  $slots = array();

  for ($intStart = $start; $intStart < $end; $intStart -> add($interval) -> add($cleanupInterval)) { 
    $endPeriod = clone $intStart;
    $endPeriod -> add($interval);
    if ($endPeriod > $end) {
      break;
    }
    $slots[] = $intStart -> format("H:iA")." - ". $endPeriod -> format("H:iA");
  }
  
  return $slots;
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
    <button id="back-btn"><a href="employee-view-bookings.php">&lt&ltBack</a></button>
    
    

        
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Booking for: <span id="slot"></span></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form action="" method="post">
                
                  <label for="">Timeslot</label>
                  <select name="timeslot" class="form-select" aria-label="Default select example">
                    <option selected>Select timeslot</option>
                    <optgroup label="For Cleaning">
                    <option value="07:00AM - 09:00AM">07:00AM - 09:00AM</option>
                    <option value="09:00AM - 11:00AM">09:00AM - 11:00AM</option>
                    <option value="11:00AM - 13:00PM">11:00AM - 13:00PM</option>
                    <option value="13:00PM - 15:00PM">13:00PM - 15:00PM</option>
                    </optgroup>
                    <optgroup label="For Repair">
                    <option value="07:00AM - 09:30AM">07:00AM - 09:30AM</option>
                    <option value="09:30AM - 12:00PM">09:30AM - 12:00PM</option>
                    <option value="12:00AM - 14:30PM">12:00AM - 14:30PM</option>
                    </optgroup>
                    <optgroup label="For Installation">
                    <option value="07:00AM - 11:00AM">07:00AM - 09:30AM</option>
                    <option value="11:00AM - 15:00PM">09:30AM - 12:00PM</option>
                    </optgroup>
                  </select>
                
                
                  <label for="">Service Type</label>
                  <select name="service" class="form-select" aria-label="Default select example">
                    <option selected>Select Service</option>
                    <option value="Cleaning">Cleaning</option>
                    <option value="Repair">Repair</option>
                    <option value="Installation">Installation</option>
                  </select>
                
               
                  <label for="">Aircon Type</label>
                  <select name="aircon" class="form-select" aria-label="Default select example">
                    <option selected>Select Aircon</option>
                    <option value="Wall Mounted">Wall Mounted</option>
                    <option value="Window Type">Window Type</option>
                    <option value="Floor Mounted">Floor Mounted</option>
                    <option value="Ceilling Cassette">Ceilling Cassette</option>
                    <option value="Ceilling Suspended">Ceilling Suspended</option>
                  </select>
                
                <div class="form-group">
                  <label for="">Name</label>
                  <input required type="text" name="fname" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Address</label>
                  <input required type="text" name="faddress" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input required type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Contact Number</label>
                  <input required type="text" name="connumber" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Message</label>
                  <textarea placeholder="Leave a message to specify your concerns" id="message" name="message" rows="4" style="resize: none;"></textarea>
                    <p>We look forward to providing you with the best air conditioning service!</p>
                </div>
                <div class="form-group pull-right">
                  <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    

  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
      $(".book").click(function(){
        var timeslot = $(this).attr('data-timeslot');
        var service = $(this).attr('data-timeslot');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#service").val(service);
        $("#myModal").modal("show");
      })
    </script>
  </body>

</html>