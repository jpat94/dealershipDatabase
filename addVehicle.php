<?php
        // Includes the php file to generate errors for the user
    include('addError.php');
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
?>

<!DOCTYPE html>
<head>
            <!-- Adds the css and gives the tab a title -->
        <title>Add Vehicle</title>
        <link rel="stylesheet" href="style.css">
</head>
<body id="add_page">
<div id="add_menu">
        <!-- Creates a formatted form for the user in which they need to enter all information
        otherwise they will get an error and be unable to add the vehicle to the database. There
        is a button to submit the information to the database and a button to return to the home
        screen -->
    <form autocomplete="off" action="addVehicle.php" method="post">
        <h1>Add a Vehicle</h1>
        <label class="left">VIN:</label>
        <input class="right" type="text" name="vin" minlength="17" maxlength="17"><br><br>
        <label class="left">Make:</label>
        <input class="right" type="text" name="make"><br><br>
        <label class="left">Model:</label>
        <input class="right" type="text" name="model"><br><br>
        <label class="left">Mileage:</label>
        <input class="right" type="text" name="miles"><br><br>
        <label class="left">List Price:</label>
        <input class="right" type="text" name="price"><br><br>
        <div id="err"><?php echo $error; ?></div><br>
        <input type="submit" name="add" value="Add Vehicle">
        <input type="submit" name="home" value="Home">
</div>
</body>
</html>

<?php
        // If the add button is clicked and the addError.php file came back with no errors, then the
        // vehicle is added to the database
    if (isset($_POST['add']))
    {
        $vin = $_POST['vin'];
        $make = $_POST['make'];
        $model = $_POST['model'];
        $miles = $_POST['miles'];
        $price = $_POST['price'];
        $conn = mysqli_connect($_SESSION['host'], $_SESSION['usr'], $_SESSION['pass'], $_SESSION['db']);
        $query = "insert into Vehicle_T values (\"$make\", \"$model\", \"$vin\", \"$miles\", \"$price\")";
        mysqli_query($conn, $query);
    }
        // If the home button is clicked, the user is sent back to the homepage
    if (isset($_POST['home']))
    {
        header('location: homepage.php');
    }
?>