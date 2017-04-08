<?php
  session_start();

  include_once('connessione.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Patente</title>
  </head>

  <body>

    <h1>Patente</h1>

    <?php
      if(isset($_SESSION['login_user'])) {
        echo "Ciao ".$_SESSION['login_user'];
        echo ", <a href='logout.php'>Esci</a>";

        include( "patente.php" );
      }
      else {
        echo "<p><a href='login.html'>Login</a> OR <a href='registrazione.html'>Registrati</a>";
      }
    ?>

    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/myjs.js"></script>

  </body>
<html>
