<!-- Nick Martinez -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Add User</title>

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

    <?php
      // Nick Martinez - Final Project
      // This script adds a user to the database and takes care of validation.
      require_once('functions.php');
      require_once('user_gateway.php');

      if( isset($_POST['email']) && isset($_POST['password']) )
      {
        $safe_email = htmlentities($_POST['email']);
        $password = $_POST['password'];

        if( !validateEmail($safe_email))
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
        } else
        {
          $hashed_password = password_hash($password, PASSWORD_DEFAULT);
          // validation complete -> add record to database
          insertUser($safe_email, $hashed_password);

          $message = "$safe_email successfully added!";
          echo("<script type='text/javascript'>alert($message);</script>");
          header('Location:home.php');
        }
      }

    ?>

 <div class="section no-pad-bot" id="index-banner">
    <div class="container" style="height:100%">
        <br>
      <div class="row center">
        <h4 class="header center blue-text">Add a new user</h4>
      </div>
      <div class="row center">
        <div style="width:50%; margin:auto;">
      <form method ="post" action="add_user.php" >
          <label>email:</label><br />
          <input type = "text" id ="email" name = "email"
            placeholder="example@gmail.com"><br />
          <label>password:</label><br />
          <input type = "text" id = "password" name = "password"
            placeholder="6-10 alphanumeric characters, >= 1 capital letter, >= 1 digit"><br />
          <a href="add_user.php" id="download-button" class="btn-large
          <?php require_once '../users/functions.php'; if(!(isLoggedIn())) echo "disabled";?>
              waves-effect waves-light teal lighten-2 white-text" type="submit">Add User!</a>
	    	</form>
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
