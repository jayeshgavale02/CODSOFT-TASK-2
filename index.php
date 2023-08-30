<?php
require('includes/conn.php');
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Travel Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <?php require('includes/header.php') ?>


    <!-- Carousel -->
    <div id="demo" class="carousel slide pt-5 " data-bs-ride="carousel">
        <div class="container bg-light shadow" style="width: 500px;" > 

      <!-- Indicators/dots -->


        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="https://images.unsplash.com/photo-1587019158091-1a103c5dd17f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZmxpZ2h0fGVufDB8fDB8fHww&w=1000&q=80"
              alt="Los Angeles" class="d-block" style="width:100%">
            <div class="carousel-caption">
              <h3 class="text-black">Welcome to</h3>
              <p class="text-black">Online Flight Travel Booking Services</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6EHbXzh1PA5F6x3tTA9alyjDqHRrlkQqBJz3aSxRO&s"
              alt="Chicago" class="d-block" style="width:100%">
            <div class="carousel-caption">
              <!-- <h3>Chicago</h3>
              <p>Thank you, Chicago!</p> -->
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://wallpaperaccess.com/full/878615.jpg" alt="New York" class="d-block" style="width:100%">
            <div class="carousel-caption">
              <!-- <h3>New York</h3>
              <p>We love the Big Apple!</p> -->
            </div>
          </div>
        </div>
      </div>

        <!-- Left and right controls/icons -->
       
      </div>

    </div>


    <div class="container mb-5 py-5">

        <!-- <h3 class=" fw-bold text-center ">Welcome to Online Flight Travel Booking Services</h3> -->

        <div class="bookingCard bg-light shadow" id="searchBox">
            <div class="d-flex p-3 bg-body-secondary">
                <ul class=" nav nav-underline mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-center" id="one_way_btn" type="button"
                            onclick="tab_change('round_trip')">One
                            Way</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="round_trip_btn" type="button" onclick="tab_change('one_way')">Round
                            Trip</a>
                    </li>

                </ul>
            </div>
            <div id="one_way">
                <form action="one_way.php" method="post">
                    <div class="container">
                        <div class="row p-3">
                            <div class="input-group mb-3">
                                <!-- <h5 class="m-2">From:-</h5> -->
                                <span class="input-group-text" id="inputGroup-sizing-sm">From:-</span>

                                <select class="form-select" name="from" required>
                                    <option value="" selected="" disabled="">Departure</option>
                                    <?php
                                    $citySql = "SELECT * FROM city ORDER BY name";
                                    $cityResult = mysqli_query($conn, $citySql);
                                    while ($row = mysqli_fetch_assoc($cityResult)) {
                                        echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">To:-</span>
                                <select class="form-select" name="to" required>
                                    <option value="" selected="" disabled="">Arrival</option>
                                    <?php
                                    $citySql = "SELECT * FROM city ORDER BY name";
                                    $cityResult = mysqli_query($conn, $citySql);
                                    while ($row = mysqli_fetch_assoc($cityResult)) {
                                        echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Depart:-</span>

                                <input type="date" name="depart" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">

                                <span class="input-group-text" id="inputGroup-sizing-sm">Class:-</span>

                                <select class="form-select" name="class" required>
                                    <option value="E">Economy</option>
                                    <option value="B">Business</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row p-3">
                            <div class="input-group mb-3">
                                <h5 class="m-2">Passenger:-</h5>

                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary"
                                        onclick="passenger_value_decrease_OW()">-</button>
                                    <input type="text" readonly class="form-control mx-3 text-center" id="passenger1"
                                        value="1" name="passenger" style="width: 70px;" required>
                                    <button type="button" class="btn btn-primary"
                                        onclick="passenger_value_increase_OW()">+</button>
                                </div>
                            </div>
                            <div class="col d-flex align-self-end justify-self-end">
                                <button type="submit" class="btn  rounded-0 w-100 ms-auto btn-primary">Search
                                    Flights</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="round_trip" hidden>
                <form action="round_trip.php" method="post">
                    <div class="container">
                        <div class="row p-3">
                            <div class="input-group mb-3">

                                <span class="input-group-text" id="inputGroup-sizing-sm">From:-</span>

                                <select class="form-select" name="from" aria-label="Default select example" required>
                                    <option value="" selected="" disabled="">Departure</option>
                                    <?php
                                    $citySql = "SELECT * FROM city ORDER BY name";
                                    $cityResult = mysqli_query($conn, $citySql);
                                    while ($row = mysqli_fetch_assoc($cityResult)) {
                                        echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">

                                <span class="input-group-text" id="inputGroup-sizing-sm">To:-</span>

                                <select class="form-select" name="to" aria-label="Default select example" required>
                                    <option value="" selected="" disabled="">Arrival</option>
                                    <?php
                                    $citySql = "SELECT * FROM city ORDER BY name";
                                    $cityResult = mysqli_query($conn, $citySql);
                                    while ($row = mysqli_fetch_assoc($cityResult)) {
                                        echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">

                                <span class="input-group-text" id="inputGroup-sizing-sm">Class:-</span>

                                <select class="form-select" name="class" aria-label="Default select example" required>
                                    <option value="E">Economy</option>
                                    <option value="B">Business</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">

                                <span class="input-group-text" id="inputGroup-sizing-sm">Depart:-</span>

                                <input type="date" name="depart" class="form-control" required>
                            </div>
                            <div class="input-group mb-3">

                                <span class="input-group-text" id="inputGroup-sizing-sm">Return:-</span>

                                <input type="date" name="return" class="form-control" required>
                            </div>

                        </div>
                    </div>
                    <div class="container">
                        <div class="row p-3">
                            <div class="input-group mb-3">
                                <h5 class="m-2">Passenger</h5>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary"
                                        onclick="passenger_value_decrease_RT()">-</button>
                                    <input type="text" readonly class="form-control mx-3 text-center" id="passenger"
                                        value="1" name="passenger" style="width: 70px;">
                                    <button type="button" class="btn btn-primary"
                                        onclick="passenger_value_increase_RT()">+</button>
                                </div>
                            </div>
                            <div class="col d-flex align-self-end justify-self-end">
                                <button type="submit" class="btn btn-primary rounded-0 w-100 ms-auto">Search
                                    Flights</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>

    <?php require('includes/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <script src="main.js"></script>
</body>

</html>