<!--
Author: Darin Alleman
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Confirm Susbscription</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
</head>
<body>
  <nav class="orange" role="navigation">
    <div  style="width:100%" class="nav-wrapper container"><a id="logo-container"
         href="../" class="brand-logo"><img src=../Ship_logo.png>
      <ul class="right hide-on-med-and-down">
        <li><a onclick="location.href='/teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='/events/home.php'" >Events</a></li>
        <li><a onclick="location.href='/subscriptions/home.php'">Subscriptions</a></li>
        <?php require_once('../users/setProfileLink.php');?>
      </ul>
      <ul id="nav-mobile" class="side-nav">
        <li><a onclick="location.href='/teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='/events/home.php'" >Events</a></li>
        <li><a onclick="location.href='/subscriptions/home.php'">Subscriptions</a></li>
        <?php require_once('../users/setProfileLinkMobile.php');?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container" style="height:100%">
        <br>
      <h4 class="header center blue-text">Subscribed!</h4>
      <div class="row center">
      <?php
      require '../db_info/db.php';

        $id = $_GET['email'];

        if($id) {
            $decrypted = openssl_decrypt($id, "aes-256-ctr", $key);
            if ($conn->connect_error) die($conn->connect_error);
            else
            {
                mysqli_query($conn,"INSERT INTO SUBSCRIPTIONS values ('".$decrypted."');");
                echo "<h5 class=\"header col s12 light\">Thank you ".$decrypted." for subscribing to the Crew email updates.</h5>";
                mysqli_commit($conn);
            }
        }
        else {
            echo '<p>No ID parameter.</p>';
        }
        $conn->close();
?>
      </div>
      <div class="row center">
        <div style="width:50%; margin:auto;">
            <script>

            </script>
        </div>

      </div>
      <br><br>

    </div>
  </div>
<footer style="position: absolute; width:100%;bottom: 0px;" class="page-footer light-blue darken-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
        </div>
      </div>
    </div>
      <div class="container">
      	<div class="row">
      		<div class="col 16 s12 grey-text text-lighten-3">
      			Created by Darin Alleman
      		</div>
      		<div class="col 14 offset-12 s12 grey-text text-lighten-3">
      			Powered by <a class="grey-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      		</div>
      	</div>
    </div>
  </footer>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<script src="../js/init.js"> </script>
  </body>
</html>
