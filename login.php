<?php
    // includes the code to give an error message to the user
include('loginstart.php');
?>

<div>
    <head>
            <!-- Adds the css and creates the title of the tab -->
        <title>St. Charles Automotive</title>
        <link rel="stylesheet" href="style.css">
    </head>
</div>
<div id="login">
    <body id="login_screen">
        <form autocomplete="off" action="" method="post">
                <!-- Creates a header for the page, asks for the users username and password;
                contains a login button that will submit the users username and password entered
                to the php file included and check to see if it's valid -->
            <h1>Vehicle Database</h1>
            <label class="left">Username:</label>
            <input class="right" type="text" name="usr" placeholder="username" required> <br>
            <label class="left">Password:</label>
            <input class="right" type="password" name="pass" placeholder="********" required>
            <br><br>
            <div id="err"><?php echo $error; ?></div><br>
            <input type="submit" name="login" value="Login"></input>
            <br>
        </form>
    </body>
</div>