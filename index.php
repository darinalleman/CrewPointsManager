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
            <thead>
              <tr>
                <th data-field="id">Out Of Bounds</th>
                <th data-field="name">Off By One</th>
                <th data-field="price">Null Pointer</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>300</td>
                <td>100</td>
                <td>50</td>
              </tr>
            </tbody>
          </table>
      </div>
      <br><br><br><br>

    </div>
  </div>

<!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <script src="./js/init.js"> </script>
  </body>
</html>
