<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>2016-2017 Crew Points Tracker</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="#b71c1c green"  role="navigation">
    <div  style="width:100%" class="nav-wrapper container"><a id="logo-container"
         href="../" class="brand-logo"><img src=../Ship_logo.png>
      <ul class="right hide-on-med-and-down">
        <li><a onclick="location.href='/webprog29/teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='/webprog29/events/home.php'" >Events</a></li>
        <li><a onclick="location.href='/webprog29/subscriptions/home.php'">Subscriptions</a></li>
        <?php require_once('../users/setProfileLink.php'); ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a onclick="location.href='/webprog29/teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='/webprog29/events/home.php'" >Events</a></li>
        <li><a onclick="location.href='/webprog29/subscriptions/home.php'">Subscriptions</a></li>
        <hr>
        <?php require_once('../users/setProfileLinkMobile.php');?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container" style="height:100%">
        <br>
      <h4 class="header center blue-text">Login</h1>
      <div class="row center">
        <div style="width:50%; margin:auto;">
          <form id = "login" method="post" action="login.php" class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="Email" id="email" type="email" class="validate">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="Password" id="password" type="password" class="validate">
              </div>
            </div>
            <br /><br />
            <button class="btn waves-effect waves-light" type="submit" name="action">Login
            </button>
          </form>
        </div>

      </div>
      <br><br>

    </div>
  </div>

  <footer class="page-footer light-blue darken-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
        </div>
      </div>
    </div>
      <div class="container">
      	<div class="row">
      		<div class="col 16 s12 grey-text text-lighten-3">
      			Created by Nick Martinez
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
