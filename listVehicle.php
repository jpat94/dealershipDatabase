<?php 
        // Continues the login session for the user
    session_start();
?>
<!DOCTYPE html>
<head>
            <!-- Adds the css and makes the title of the tab the following -->
        <title>Vehicle List</title>
        <link rel="stylesheet" href="style.css">
</head>
<body id="list_page">
    <div>
        <form id="list_menu" action="listVehicle.php" method="post">
                <!-- Creates a header for the page -->
            <h1>Vehicle Inventory</h1>
            <input type="submit" name="home" value="Home"><br><br>
            <?php
                    // Establishes a connection to the database
                $conn = mysqli_connect($_SESSION['host'], $_SESSION['usr'],
                                       $_SESSION['pass'], $_SESSION['db']);
                $query = "select make, model, vin, format(miles, 0) as miles, format(price, 0) as price from Vehicle_T order by make";
                    
                    // Submits the query to mysql
                $result = $conn->query($query);

                    // If there is at least 1 row generated from the query, the table will print
                if ($result->num_rows > 0)
                {
                    echo "<table border=1 width=568> <tr> <th>Make</th> <th>Model</th>".
                         "<th>VIN</th> <th>Miles</th> <th>Price</th>";

                    while ($row = $result->fetch_assoc())
                    {
                        echo "<tr><td>".$row["make"]."</td><td>".$row["model"]."</td>".
                             "<td>".$row["vin"]."</td><td>".$row["miles"]."</td>".
                             "<td>".$row["price"]."</td><td><a href='delete.php?vin=".$row["vin"]."'>".
                             "Remove</a></td></tr>";
                    }
                    echo "</table>";
                }
                else
                {
                        // If no rows are found from the query result, then a message prints out to let the
                        // user know
                    echo "No vehicles found in the database.";
                }
            ?>
        </form>
    </div>
</body>
</html>

<?php
    if (isset($_POST['home']))
    {
            // Sends the user to the homepage if they press the home button
        header("location: homepage.php");
    }
?>