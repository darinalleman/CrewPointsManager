<!--
Author: Darin Alleman
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>2016-2017 Crew Points Tracker</title>

<!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div  style="width:100%" class="nav-wrapper container"><a id="logo-container"
         href="" class="brand-logo"><img src=Ship_logo.png>
      <ul class="right hide-on-med-and-down">
        <li><a onclick="location.href='teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='events/home.php'" >Events</a></li>
        <li><a onclick="location.href='subscriptions/home.php'" >Subscriptions</a></li>
        <?php
          require_once('users/setProfileLink.php');
        ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a onclick="location.href='teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='events/home.php'" >Events</a></li>
        <li><a onclick="location.href='subscriptions/home.php'">Subscriptions</a></li>
        <hr>
        <?php
            require_once('users/setProfileLinkMobile.php');
         ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h4 class="header center orange-text">Current Standings</h4>
      <div class="row center">
         <table class="centered" style="width:100%">
           <?php
              require_once './db_info/db.php';

              $query = "SELECT * FROM TEAMS";
              $result = $conn->query($query);
              echo "<thead><tr>";
              while($row = mysqli_fetch_array($result))
              {
                echo "<th>".$row['name']."</th>";
              }
              echo "</tr></thead>";
              echo "<tbody><tr>";
              $result = $conn->query($query);
              while($row = mysqli_fetch_array($result))
              {
                $nameString = $row['name'];
                $npPointsQuery = "SELECT SUM(points) AS points FROM EVENTS e, RESULTS r, TEAMS t where r.event_id = e.id and r.winner_id = t.id and t.name = '$nameString'";
                $npPointsResult = $conn->query($npPointsQuery);

                while($row2 = mysqli_fetch_array($npPointsResult))
                {
                  if ($row2['points'] == null)
                  {
                    echo "<td>0</td>";
                  }
                  else{
                    echo "<td>".$row2['points']."</td>";
                  }
                }
              }
              echo "</tr></tbody>";
            ?>
          </table>
      </div>
      <br><br><br><br>

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
      			Darin Alleman, Nick Martinez, Andrew Corchado, Ryan Handley
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
  <script src="./js/init.js"> </script>
  </body>
</html>
