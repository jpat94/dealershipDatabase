    <!-- Creates a script that will add functionality to the search button
    and the home buttons. I found this script from stack overflow and decided
    to use it because I wanted to try out javascript within my website -->
<script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('search_menu');
    form.action = action;
    form.submit();
  }
</script>

<div>
    <head>
            <!-- Adds the css and sets the tittle for the tab -->
        <title>Find Manufacturer</title>
        <link rel="stylesheet" href="style.css">
    </head>
</div>

<div>
    <body id="search_page">
        <form id="search_menu" method="post">
            <!-- Adds a header for the page and then prompts the user to enter in the manufacturer
            they wish to search the database for; The buttons will send the request to the search.php
            section of this page or will take the user to the homepage -->
        <h1>Search Manufacturers</h1>
        <label class="left">Manufacturer:</label>
        <input class="right" type="text" name="mfg"><br><br>
        <input type="submit" onclick="submitForm('search.php')" name="find" value="Search">
        <input type="submit" onclick="submitForm('homepage.php')" value="Home"><br><br>
        </form>
    </body>
</div>

<?php
        // If the find button is clicked, the following occurs
    if (isset($_POST['find']))
    {
            // If there was no text entered into the searchbar, then the user is redirected to 
            // the search page again; essentially nothing happens for the user
        if (empty($_POST['mfg']))
        {
            header('location: search.php');
        }
        else
        {
                // If there is something in the search bar, then the session will store the users
                // input for the results page and then sends the user to the results page
            session_start();
            $_SESSION['mfg'] = $_POST['mfg'];
            header('location: results.php');
        }
    }
?>