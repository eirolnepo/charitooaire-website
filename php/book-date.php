<?php

$service = $_REQUEST['service'];
$aircon = $_REQUEST['aircon'];
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
    $aircontype = $_REQUEST["aircon"];
    $servicetype = $_REQUEST["service"];
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
          $msg = "<div class='alert alert-success role='alert' style='width:48%;text-align:left;margin-left:0'>Booking Successful!</div>";
          $bookings[]= $timeslot;
          $stmt->close();
          $mysqli->close();
        }
}
}

$duration = "";
$cleanup = "";
$start = "07:00";
$end = "16:00";
$req_service1 = "cleaning";
$req_service2 = "repair";
$req_service3 = "installation";
if ($service == $req_service1) {
  $duration = 120;
  $cleanup = 0;
} elseif ($service == $req_service2) {
  $duration = 150;
  $cleanup = 0;
} elseif ($service == $req_service3) {
  $duration = 240;
  $cleanup = 0;
}

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/book-date.css">
  </head>

  <body>
    <div id="main-container">
    <a href="services.php"><img src="../imgs/back-btn.svg" style="width: 3rem; filter: invert(100%) sepia(100%) saturate(1%) hue-rotate(36deg) brightness(106%) contrast(101%);"></a>
    <div class="container">
        <h1>Book a Service for <?php echo date('F j, Y', strtotime($date)); ?></h1><hr style="width:47%;text-align:left;margin-left:0"><br>
        <?php echo isset($msg)?$msg:''; ?>
        <div class="row">
        
            <?php $timeslots = timeslot($duration, $cleanup, $start, $end);
            foreach ($timeslots as $ts ) {
            ?>
            <div class= "col-md-2">
              <div class="form-group">
                <?php 
                if (in_array($ts, $bookings)) { ?>
                 <button class= "btn btn-danger" ><?php echo $ts; ?></button>
                <?php } else{?>
                  <button class= "btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>  
              <?php } ?>
              </div>
              
        </div>
        
        <?php 
            }
        ?>
    </div>
    
        
    </div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Booking for: <span id="slot"></span></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form action="" method="post">
                <div class="form-group">
                  <label for="">Timeslot</label>
                  <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Service Type</label>
                  <input type="text" readonly name="serviceType" value="<?php echo $service?>" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Aircon Type</label>
                  <input type="text" readonly name="airconType" value="<?php echo $aircon?>" class="form-control">
                </div>
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
                  <textarea placeholder="Leave a message to specify your concerns" id="message" name="message" rows="3" cols="70" style="resize: none;"></textarea>
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