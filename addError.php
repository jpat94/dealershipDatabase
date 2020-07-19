<?php
        // Continues the users login session
    session_start();

        // Preps for an error message for the user
    $error = ' ';

        // If the add button was pressed, the following executes
    if (isset($_POST['add']))
    {
            // If none of the fields were filled in, an error message is sent to the
            // user and they are required to enter something into all fields
        if (empty($_POST['vin']) || empty($_POST['make']) || empty($_POST['model'])
        || empty($_POST['miles']) || empty($_POST['price']))
        {
            $error = "Please fill in all fields.";
        }
        else
        {
                // If the fields are all filled in, a query is ran and if the VIN has
                // already been used in the database, the user will get an error message
                // letting them know
            $query = "select * from Vehicle_T where vin=\"".$_POST['vin']."\"";
            $conn = mysqli_connect($_SESSION["host"], $_SESSION["usr"],
                                    $_SESSION["pass"], $_SESSION["db"]);
            $result = $conn->query($query);
            if ($result->num_rows > 0)
            {
                $error = "VIN is already associated with<br>another vehicle in the database.";
            }
        }
    }
?>