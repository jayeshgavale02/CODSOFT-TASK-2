<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Online Travel Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <?php require('includes/header.php') ?>
<div class="container" style="border: black;">




</div>


    <?php require('includes/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>




<div class="card" style="width: 18rem;">
  <div class="card-header">
  Pay Invoice
  </div>
  <?php
            if ($_POST['type'] == 'one_way') {
            ?>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <h3>Class</h3><?php if ($class == "E") { echo "Economy"; } else { echo "Business";
           } ?></li>
    <li class="list-group-item">  <h5 class="">Passenger </h5><span class="fs-5"><?php echo $passenger ?></span></li>
    <li class="list-group-item"><h5 class="">Airline </h5><span class="fs-5"><?php echo $row['airline'] ?></span></li>
    <li class="list-group-item"><h5 class="">From </h5><span class="fs-5"><?php echo $row['source'] ?></span></li>
    <li class="list-group-item"><h5 class="">To </h5><span class="fs-5"><?php echo $row['Destination'] ?></span></li>
    <li class="list-group-item"><h5 class="">Price </h5><span class="fs-5">
                                    <?php
                                    $total = $row['Price'] * $passenger;
                                    echo '<i class="bi bi-currency-rupee"></i>' . $total
                                    ?>
                                </span></li>
    <li class="list-group-item"> <button id="rzp-button1" class="btn btn-success rounded-0">Pay <i class="bi bi-lock-fill"></i></button></li>

  
</ul>
</div>
