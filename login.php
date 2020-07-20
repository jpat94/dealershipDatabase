<?php
    include('../dealershipConnector/dbConnect.php');
    session_start();

    if (isset($_POST['login'])) {

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = "select * from users where username = '$username' and password=sha1('$password')";

        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            header("Location: homepage.php");
            $_SESSION['username'] = $username;
        }
        else {
            $error = "Username or password invalid!";
        }
    }
?>

<html>
    <link rel="stylesheet" href="style.css">
    <head>
        <title>
            St. Charles Automotive
        </title>
    </head>
    <body id="login_screen">
        <div id="login">
            <form autocomplete="off" method="post">
                <h1>Vehicle Database</h1>
                <label class="left">Username:</label>
                <input class="right" type="text" name="username" placeholder="username" required>
                <br>
                <label class="left">Password:</label>
                <input class="right" type="password" name="password" placeholder="********" required>
                <br><br>
                <div id="err">
                    <?php echo $error; ?>
                </div>
                <br>
                <input class="button" type="submit" name="login" value="Login"></input>
                <br>
            </form>
        </div>
    </body>
</html>