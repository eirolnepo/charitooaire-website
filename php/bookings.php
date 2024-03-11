<?php
session_start();
function build_calendar($month, $year) {
    $mysqli = new mysqli('localhost', 'root', '', 'book_db');
    //create an array containing days of the week
     $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    //first day of the month
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
    //total days of the month
     $numberDays = date('t',$firstDayOfMonth);
    //get the first date of the month
     $dateComponents = getdate($firstDayOfMonth);

     $monthName = $dateComponents['month'];

     $dayOfWeek = $dateComponents['wday'];

     $datetoday = date('Y-m-d');
    
     
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."&service=".$_GET['service']."&aircon=".$_GET['aircon']."'>Previous Month</a> ";
    
    $calendar.= " <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."&service=".$_GET['service']."&aircon=".$_GET['aircon']."'>Current Month</a> ";
    
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."&service=".$_GET['service']."&aircon=".$_GET['aircon']."'>Next Month</a></center><br>";
    
      $calendar .= "<tr>";
    //create the calendar headers
     foreach($daysOfWeek as $day) {
          $calendar .= "<th  class='header'>$day</th>";
     } 

     $currentDay = 1;

     $calendar .= "</tr><tr>";

     if ($dayOfWeek > 0) { 
         for($k=0;$k<$dayOfWeek;$k++){
                $calendar .= "<td  class='empty'></td>"; 

         }
     }
    
     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  
     while ($currentDay <= $numberDays) {
          if ($dayOfWeek == 7) {

               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";
          }
          
          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
          $date = "$year-$month-$currentDayRel";
      
            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
            if ($dayname=='sunday') {
                $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Holiday</button>";
            }elseif($date<date('Y-m-d')){
               $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
            }else{
                //display total bookings that depends in services
                //try niyo muna iclear yung data sa db baka kasi may bug
                //yung bug: hindi nabibilang yung mga data sa db before creation ng logic sa baba 
                $service = $_GET['service'];
                $totalbookings_cleaning = checkslot($mysqli,$date,$service);
                $totalbookings_repair = checkslot($mysqli,$date,$service);
                $totalbookings_installation = checkslot($mysqli,$date,$service);
                if ($_REQUEST['service'] == 'cleaning' ) {
                    if ($totalbookings_cleaning==4) {
                        $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='#' class='btn btn-danger btn-xs'>All Booked</a>";    
                    }else {
                        $availableslot_cleaning = 4 - $totalbookings_cleaning;
                        $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book-date.php?date=".$date."&service=".$service."&aircon=".$_GET['aircon']."' class='btn btn-success btn-xs'>Book</a><small><i>$availableslot_cleaning slots left</i></small>";
                    }
                }elseif ($_REQUEST['service'] == 'repair') {
                    if ($totalbookings_repair==3) {
                        $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='#' class='btn btn-danger btn-xs'>All Booked</a>";    
                    }else {
                        $availableslot_repair = 3 - $totalbookings_repair;
                        $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book-date.php?date=".$date."&service=".$service."&aircon=".$_GET['aircon']."' class='btn btn-success btn-xs'>Book</a><small><i>$availableslot_repair slots left</i></small>";
                    }
                } else {
                    if ($totalbookings_installation==2) {
                        $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='#' class='btn btn-danger btn-xs'>All Booked</a>";    
                    }else {
                        $availableslot_installation = 2 - $totalbookings_installation;
                        $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book-date.php?date=".$date."&service=".$service."&aircon=".$_GET['aircon']."' class='btn btn-success btn-xs'>Book</a><small><i>$availableslot_installation slots left</i></small>";
                    }
                }

            }  
            
           
            
          $calendar .="</td>";

          $currentDay++;
          $dayOfWeek++;
     }

     if ($dayOfWeek != 7) { 
     
          $remainingDays = 7 - $dayOfWeek;
            for($l=0;$l<$remainingDays;$l++){
                $calendar .= "<td class='empty'></td>"; 

         }
     }
     $calendar .= "</tr>";
     $calendar .= "</table>";
     echo $calendar;
} 

function checkslot($mysqli,$date,$service){
    $stmt = $mysqli->prepare("select * from bookings WHERE Date = ? and serviceType = ?");
    $stmt->bind_param('ss', $date, $service);
    $totalbookings = 0;
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $totalbookings++;
            }
            
            $stmt->close();
         }
    }
    return $totalbookings;
}
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Charitoo Aire</title>
    <link rel="icon" href="../imgs/company-logo-circle.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Poppins;

            color: white;
        }

        body {
            background-color: #01395E;
        }
       @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {
            table, thead, tbody, th, td, tr {
                display: block;

            }
            
            .empty {
                display: none;
            }

            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:nth-of-type(1):before {
                content: "Sunday";
            }
            td:nth-of-type(2):before {
                content: "Monday";
            }
            td:nth-of-type(3):before {
                content: "Tuesday";
            }
            td:nth-of-type(4):before {
                content: "Wednesday";
            }
            td:nth-of-type(5):before {
                content: "Thursday";
            }
            td:nth-of-type(6):before {
                content: "Friday";
            }
            td:nth-of-type(7):before {
                content: "Saturday";
            }

        }

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }

        @media (min-width:641px) {
            table {
                table-layout: fixed;
            }
            td {
                width: 33%;
            }
        }
        
        .row{
            margin-top: 20px;
        }
        
        .today{
            background:#80D9FF;
        }  

        #back-btn {
            background-color: #01395E;
            border: none;
            text-decoration: none;
            color: white;
            font-size: 1.8rem;
        }

        .back-btn-border {
            border: 1px white solid;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button class="back-btn-border"><a href="services.php" id="back-btn">&lt&ltBack</a></button>
                <?php
                     $dateComponents = getdate();
                     if(isset($_GET['month']) && isset($_GET['year'])){
                         $month = $_GET['month']; 			     
                         $year = $_GET['year'];
                     }else{
                         $month = $dateComponents['mon']; 			     
                         $year = $dateComponents['year'];
                     }
                    echo build_calendar($month,$year);
                ?>
            </div>
        </div>
    </div>
</body>
</html>