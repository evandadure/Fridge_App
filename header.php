<?php

  session_start(); 
  include 'DB/db.php';

  // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Fridgee</title>

    <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Custom styles for this website -->
    <link href="CSS/offcanvas.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Fridgee</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="ingredients.php">My ingredients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="find_recipe.php">Find a recipe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_recipe.php">Add a new recipe</a>
          </li>
        </ul>


<?php
      if(isset($_SESSION['u_id'])){//If the user is connected
        echo'<form action="DB/signout.php" method="POST">
            <label style="color:white" class="" for="submitLogout">Hello, '.$_SESSION['username'].'</label>
            <button type="submit" name="submitLogout" class="btn btn-danger my-4 my-sm-0">Sign out</button>
          </form>';
      }else{//if he's not
        echo '<a class="btn btn-success my-4 my-sm-0"  href="signin.php">Sign in</a>';
      }
?>
      </div>
    </nav>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="scripts/ie10-viewport-bug-workaround.js"></script>


    <!-- other functions for the website (some created by us) -->
    <script src="scripts/offcanvas.js"></script>
    <script src="scripts/functions.js"></script>
  </body>
</html>