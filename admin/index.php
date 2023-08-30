<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    require('../includes/conn.php');
    $today = date("Y-m-d");
} else {
    header('location: login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Online Travel Booking </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <?php require('includes/header.php') ?>

    <div class="container">
       

        <div class="my-5 p-3 shadow">
            <h3 class="text-secondary text-center">Today's Flights</h3>
            <table class="table table-bordered table-striped table-dark">
               
                <thead class="thead-dark">
  
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Airlines</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Source</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Departure</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `flights` WHERE `departure` LIKE '$today%' AND `status` IS NULL";
                    $result = mysqli_query($conn,$sql);
                    $sr = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        
                        echo '<tr>
                        <th scope="row">'.$sr.'</th>
                        <td>'.$row['airline'].'</td>
                        <td>'.$row['Destination'].'</td>
                        <td>'.$row['source'].'</td>
                        <td>'.$row['arrivale'].'</td>
                        <td>'.$row['departure'].'</td>
                        <td>
                            <a href="api/api_utils.php?id='.$row['id'].'&status=departed" class="btn btn-dark btn-sm">Departed</a>
                        </td>
                    </tr>';
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>

        <div class="my-5 p-3 shadow">
            <h3 class="text-secondary text-center">Today Flights Departed </h3>
            <table class="table table-bordered table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Airlines</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Source</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Departure</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `flights` WHERE `departure` LIKE '$today%' AND `status` = 'departed'";
                    $result = mysqli_query($conn,$sql);
                    $sr = 1; 
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                        <th scope="row">'.$sr.'</th>
                        <td>'.$row['airline'].'</td>
                        <td>'.$row['Destination'].'</td>
                        <td>'.$row['source'].'</td>
                        <td>'.$row['arrivale'].'</td>
                        <td>'.$row['departure'].'</td>
                        <td>
                            <a href="api/api_utils.php?id='.$row['id'].'&status=arrived" class="btn btn-danger btn-sm">Arrived</a>
                        </td>
                    </tr>';
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>

        <div class="my-5 p-3 shadow">
            <h3 class="text-secondary text-center">Today Flights Arrived </h3>
            <table class="table table-bordered table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Airlines</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Source</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Departure</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `flights` WHERE `departure` LIKE '$today%' AND `status` = 'arrived'";
                    $result = mysqli_query($conn,$sql);
                    $sr=1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                        <th scope="row">'.$sr.'</th>
                        <td>'.$row['airline'].'</td>
                        <td>'.$row['Destination'].'</td>
                        <td>'.$row['source'].'</td>
                        <td>'.$row['arrivale'].'</td>
                        <td>'.$row['departure'].'</td>
                    </tr>';
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>

    <?php require('includes/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="main.js"></script>
</body>

</html>