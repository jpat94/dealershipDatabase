<?php
        // Generates a blank error message to be filled in if the conditions
        // are met
    $error = ' ';

        // Detects if the login button was pressed
    if (isset($_POST['login']))
    {
            // Starts the login session for the user that will hold their username
            // and password they entrered so they don't have to continually log in
            // anytime they want to make a change or run a query on the database;
            // The host connection is set to "localhost" and the database is the 
            // same as their username
        session_start();
        $_SESSION["host"] = "localhost:1111";
        $_SESSION["usr"] = $_POST["usr"];
        $_SESSION["pass"] = $_POST["pass"];
        $_SESSION["db"] = "dealership";

            // Establishes a connection to the database
        $conn = @mysqli_connect($_SESSION["host"], $_SESSION["usr"],
                                $_SESSION["pass"], $_SESSION["db"]);

            // If the connection fails, it's due to a username and password problem
            // and the user is given the error so they know; Otherwise the user is
            // then sent to the homepage of the dealership database
        if (!$conn)
        {
            $error = "Username or password is invalid!";
        }
        else
        {
            header("location: homepage.php");
        }
    }
?>