<?php
  // Nick Martinez - Final Project
  // This script adds a user to the database and takes care of validation.
  require_once('functions.php');
  require_once('user_gateway.php');

  $safe_email = htmlentities($_POST['email']);
  $password = $_POST['password'];

  if( !validateEmail($safe_email)
  {
    $message = "Email not valid. Please enter a valid email.";
    echo("<script type='text/javascript'>alert($message);</script>");
    header('Location:add_user.php');
  }

  if( !validateEmail($password) )
  {
    $message = "Password not valid. Please enter a valid password. A valid
      password consists of between 6 and 10 alphanumeric characters, at least
      one capital letter, and at least one digit.";
    echo("<script type='text/javascript'>alert($message);</script>");
    header('Location:add_user.php');
  }

  // Now that we have validated the email and password server-side, we can
  // insert the new user data into the database. Reminder that PDO sanitizes
  // the strings for us.
  insertUser($safe_email, $password);
  
  header('Location:home.php');
?>

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
      <div style="width:100%" class="nav-wrapper container"><a id="logo-container" href="../" class="brand-logo"><img src=../Ship_logo.png></a>
        <ul class="right hide-on-med-and-down">
          <li><a onclick="location.href='../index.php'" >Home</a></li>
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

		<form method ="post" action="add_user.php" >
			<label>email:</label><br>
			<input type = "text" id ="email" name = "email"
        placeholder="example@gmail.com"><br>
			<label>password:</label><br>
			<input type = "text" id = "password" name = "password"
        placeholder="6-10 alphanumeric characters, >= 1 capital letter, >= 1 digit"><br>
			<button type = "submit">Add User!</button>
		</form>

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
