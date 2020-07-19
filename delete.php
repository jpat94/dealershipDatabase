<?php
        // Retrieves the vin from the row that is to be deleted
    $vin = $_GET['vin'];

        // Continues the login session of the user, establishes
        // a connection to the database, and runs a query to remove
        // the vehicle from the database
    session_start();
    $conn = mysqli_connect($_SESSION['host'], $_SESSION['usr'],
                           $_SESSION['pass'], $_SESSION['db']);
    $query = "delete from Vehicle_T where vin=\"$vin\"";

        // If the query is successful, the vehicle is removed
        // from the database and the user is returned to the 
        // list of vehicles in the database
    if (mysqli_query($conn, $query))
    {
        header('location: listVehicle.php');
        exit;
    }
?>