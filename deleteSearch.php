<?php
        // Retrieves the vin from the row of the vehicle to be deleted
    $vin = $_GET['vin'];

        // Continues the users login session, establishes a connection to the
        // database, and runs a query to remove the vehicle from the dealership
        // database
    session_start();
    $conn = mysqli_connect($_SESSION['host'], $_SESSION['usr'],
                           $_SESSION['pass'], $_SESSION['db']);
    $query = "delete from Vehicle_T where vin=\"$vin\"";

        // If the query is successful, the user is returned back to the results page
    if (mysqli_query($conn, $query))
    {
        header('location: results.php');
        exit;
    }
?>