<div>
    <head>
            <!-- Adds the css and creates the title for the tab -->
        <title>Results</title>
        <link rel="stylesheet" href="style.css">
    </head>
</div>

<body id="search_page">
    <form id="list_menu" action="search.php">
        <?php
                // Continues the user login session, establishes the connection to the database, and runs
                // a query to list the user requested manufacturer
            session_start();
            $conn = mysqli_connect($_SESSION['host'], $_SESSION['usr'],
                                   $_SESSION['pass'], $_SESSION['db']);
            $query = "select make, model, vin, format(miles, 0) as miles, format(price, 0) as price ".
                     "from Vehicle_T where make =\"".$_SESSION['mfg']."\" order by model";
            $result = $conn->query($query);

                // Creates a header for the results page
            echo "<h1>Results for \"".$_SESSION['mfg']."\"</h1>";

                // If the query results in more than one row, the table is created and the results are printed
                // to the page in the form of a table; the user has the option to remove a vehicle from the database
                // at that point
            if ($result->num_rows > 0)
            {
                echo "<table border=1 width=585 id=text> <tr> <th>Make</th> <th>Model</th>".
                     "<th>VIN</th> <th>Miles</th> <th>Price</th>";

                while ($row = $result->fetch_assoc())
                {
                    echo "<tr><td>".$row["make"]."</td><td>".$row["model"]."</td>".
                        "<td>".$row["vin"]."</td><td>".$row["miles"]."</td>".
                        "<td>".$row["price"]."</td><td><a href='deleteSearch.php?vin=".$row["vin"]."'>".
                        "Remove</a></td></tr>";
                }
                echo "</table><br>";
            }
            else
            {
                    // If no rows are found after the query is ran, then a simple message is displayed to the user
                    // that there are no results found
                echo "<p>No vehicles found in the database.</p>";
            }
                // Adds a button that lets the user go back to the search page
            echo "<input type=submit value=Back>";
        ?>
    </form>
</body>