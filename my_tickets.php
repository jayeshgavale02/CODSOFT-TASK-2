<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    require('includes/conn.php');
} else {
    header('location: login.php');
}


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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>

<body>
    <?php require('includes/header.php') ?>

    <div class="container my-5 ">
        <h3 class="text-center mb-4">TICKETS</h3>
        <?php
        $getTicketsSql = "SELECT * FROM ticket WHERE user_id =" . $_SESSION['user_id'];
        $getTicketsResult = mysqli_query($conn, $getTicketsSql);
        while ($row = mysqli_fetch_assoc($getTicketsResult)) {
            $flight_id = $row['flight_id'];
            $passenger_id = $row['passenger_id'];

            $getSql = "SELECT * 
            FROM flights, passenger_profile 
            WHERE flights.id = $flight_id AND passenger_profile.id=$passenger_id";
            $getResult = mysqli_query($conn, $getSql);

            $getRow = mysqli_fetch_assoc($getResult);
            ?>

            <div class="row" id="ticket<?php echo $row['id']; ?>" >
                <div class="col-sm-6 d-flex">
                    <div class="card " style="width: 18rem;">
                        <div class="card-header text-center">
                            TICKETS
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <b>NAME :-</b>
                                <?php echo $getRow['f_name'] . " " . $getRow['m_name'] . " " . $getRow['l_name']; ?>
                            </li>
                            <li class="list-group-item"><b>AIRLINE&nbsp:-</b>
                                <?php echo $getRow['airline']; ?>
                            </li>
                            <li class="list-group-item"><b>FROM&nbsp:-</b>
                                <?php echo $getRow['source']; ?>
                            </li>
                            <li class="list-group-item"> <b>TO&nbsp:-</b>
                                <?php echo $getRow['Destination']; ?>
                            </li>
                            <li class="list-group-item"> <b>CLASS&nbsp:-</b>
                                <?php echo $row['class'] == 'E' ? 'Economy' : 'Business'; ?>
                            </li>
                            <li class="list-group-item"> <b>DEPART&nbsp:-</b>
                                <?php echo $getRow['departure']; ?>
                            </li>
                            <li class="list-group-item"> <b>ARRIVAL&nbsp:-</b>
                                <?php echo $getRow['arrivale']; ?>
                            </li>
                            <li class="list-group-item"> <b>SEAT&nbsp:-</b>
                                <?php echo $row['seat_no']; ?>
                            </li>
<!-- 
                            <li class="list-group-item"> <button class=" btn btn-dark"
                                    onclick="print_ticket(<?php echo $row['id']; ?>)">Download Ticket <i
                                        class="bi bi-download"></i></button>
                            </li> -->

                        </ul>
                    </div>
                </div>
            </div>
            <li class="list-group-item"> <button class=" btn btn-dark"
                                    onclick="print_ticket(<?php echo $row['id']; ?>)">Download Ticket <i
                                        class="bi bi-download"></i></button>
                            </li>
            <?php
        }
        ?>
    </div>

    <?php require('includes/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="main.js"></script>
</body>

</html>