<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>2016-2017 Crew Points Tracker</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="#b71c1c green"  role="navigation">
    <div style="width:100%" class="nav-wrapper container"><a id="logo-container" href="../" class="brand-logo"><img src=../Ship_logo.png></a>
      <ul class="right hide-on-med-and-down">
        <li><a onclick="location.href='../index.html'" >Home</a></li>
        <li><a onclick="location.href='../events/home.php'" >Events</a></li>
        <li><a onclick="location.href='../subscriptions/home.php'">Subscriptions</a></li>
        <li><a href="../users/home.html"><i class="material-icons left">account_circle</i>Profile</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="row">
    <h5>Please Login.</h5>
    <form method="post" action="login.php" class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <br /><br />
      <button class="btn waves-effect waves-light" type="submit" name="action">Login
      </button>
    </form>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>

  </body>
</html>
