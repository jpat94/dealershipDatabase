<?php
    error_reporting(0);
        // Starts a session to save the log-in information
    session_start();

        // Establishes a connection to the database
    $conn = mysqli_connect($_SESSION["host"], $_SESSION["usr"], 
                           $_SESSION["pass"], $_SESSION["db"]);

    if (!$conn)
    {
            // Redirects user back to login page if the user tries to manually navigate
            // to the homepage
        header("location: login.php");
    }
        // Runs a query to create a table for the vehicle database if one doesn't
        // already exist
    $query = "create table if not exists Vehicle_T ".
             "(make char(30), model char(30), vin char(17), ".
             "miles int, price int, ".
             "primary key (vin))";
    @mysqli_query($conn, $query);
?>


<div>
    <head>
            <!-- Adds the css and creates the name of the tab -->
        <title>Homepage</title>
        <link rel="stylesheet" href="style.css">
    </head>
</div>


<!DOCTYPE html>
<body id="webpage">
    <div id="db_menu">
            <!-- A header for th main menu; below it is a welcome message for the user;
            the user is then given a list of options to choose from as to what action to take
            within the database; a button is included at the end to have the user "sign-out"
            and send them back to the login page -->
        <h1>Main Menu</h1>
        <p>Welcome, <?php echo $_SESSION['usr'];?>!</p>
        <a href="addVehicle.php">Add a new vehicle to the database.</a> <br><br>
        <a href="listVehicle.php">View all vehicles in the database.</a> <br><br>
        <a href="search.php">Search the database for a vehicle.</a> <br> <br>
        <a href="login.php"><input type="submit" name="logout" value="Sign Out"></a>
    </div>
</body>
</html>