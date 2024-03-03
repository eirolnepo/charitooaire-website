
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Bookings</title>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Member</h1>
        </header>
    <div class="editor">

    
    <?php
        include_once 'book-db.php';
        $result = mysqli_query($mysqli,"SELECT * FROM bookings")
        ?>
        <?php
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result)
    ?>
        <form action="#" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="fname" value="<?php echo $row["fullName"]?>" placeholder="Full Name:">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="faddress" value="<?php echo $row["fullAddress"]?>" placeholder="Full Address:">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="email" value="<?php echo $row["email"]?>" placeholder="Birth Date:">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="connnumber" value="<?php echo $row["contactNum"]?>" placeholder="Contact Number:">
            </div>
            <div class="form-element my-4">
                <label for="aircontype">Aircon Type</label>
                <select name="aircontype" class="form-control">
                        <option value="Window Aircon"  <?php if($row['airconType']=="Window Aircon"){echo "selected";} ?>>Window Air Conditioners</option>
                        <option value="Split Aircon"  <?php if($row['airconType']=="Split Aircon"){echo "selected";} ?>>Split Air Conditioners</option>
                        <option value="Central Aircon"  <?php if($row['airconType']=="Central Aircon"){echo "selected";} ?>>Central Air Conditioners</option>
                        <option value="Hybrid Aircon"  <?php if($row['airconType']=="Hybrid Aircon"){echo "selected";} ?>>Hybrid Air Conditioners</option>
                </select>
            </div>

             <div class="form-element my-4">
             <label for="servicetype">Aircon Type</label>
             <select name="servicetype" class="form-control">
                        <option value="Cleaning"  <?php if($row['serviceType']=="Cleaning"){echo "selected";} ?>>Cleaning</option>
                        <option value="Repair"  <?php if($row['serviceType']=="Repair"){echo "selected";} ?>>Repair</option>
                        <option value="Installation"  <?php if($row['serviceType']=="Installation"){echo "selected";} ?>>Installation</option>
                        <option value="Maintenance"  <?php if($row['serviceType']=="Maintenance"){echo "selected";} ?>>Maintenance</option>
                </select>
             
        </div>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-element my-4">
                <input type="submit" name="editm" value="Edit Booking" class="btn btn-primary">
            </div>
        </form>

            <?php
            }
        

        else {
            echo "No result found";
        }
            ?> 
    </div>
</body>
</html>