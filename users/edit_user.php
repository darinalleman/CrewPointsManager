<!-- Nick Martinez -->
<!DOCTYPE html>
<html lang='en'>
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

    <h3>Change Your Password</h3>
    <div class"row-center">
    <div style="width:50%; margin:auto;">
      <form name="password_change" method="post" action="edit_user.php" onsubmit="return validateForm()">
        <label>current password:</label><br />
        <input type="text" id="current_password" name="current_password" /><br />
        <label>new password:</label><br />
        <input type="text" id="new_password" name="new_password" /><br />
        <label>re-enter new password:</label><br />
        <input type="text" id="confirm_password" name="confirm_password" /><br />
        <button class="btn waves-effect waves-light" type="submit">DO IT.</button>
      </form>
    </div>
    </div>


    <?php
      // This inline PHP checks the entered current password against the password
      // stored in the database. If the check succeeds, then the password is
      // updated.
      require_once('functions.php');
      require_once('user_gateway.php');

      if( isset($_POST['current_password']) && isset($_POST['new_password'])
        && isset($_POST['confirm_password']) )
      {
        $current_user = $_SESSION['email'];
        $user = fetchUser($current_user);
        if( password_verify($_POST['current_password'], $user['password']) )
        {
          // reminder - password_hash salts it too
          $hashed_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);
          updateUser($current_user, $hashed_password);
          $message = "Password updated!";
          echo("<script type='text/javascript'>alert($message);</script>");
          header('Location:../index.php');
        } else
        {
          $message = "Current password is not correct. Enter your password.";
          echo("<script type='text/javascript'>alert($message);</script>");
        }
      }
    ?>

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
        			Nick Martinez
        		</div>
        		<div class="col 14 offset-12 s12 grey-text text-lighten-3">
        			Powered by <a class="grey-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        		</div>
        	</div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script src="../js/init.js"> </script>
    <script>
      // Nick Martinez

      /**
       * This function validates that the new password is valid and that
       * both of the new and confirm input fields are the same.
       * Return true if valid, false otherwise.
       */
      function validateForm()
      {
        var result = true;

        var currentPassword = document.password_change.current_password;
        var newPassword = document.password_change.new_password;
        var confirmPassword = document.password_change.confirm_password;

        if ( !currentPassword.value )
        {
          currentPassword.focus();
          document.getElementById("current_password").innerHTML = "required field!";
          output = false;
        } else if ( !newPassword.value )
        {
          newPassword.focus();
          document.getElementById("new_password").innerHTML = "required field!";
          output = false;
        } else if ( !confirmPassword.value )
        {
          confirmPassword.focus();
          document.getElementById("confirm_password").innerHTML = "required field!";
          output = false;
        }

        if ( newPassword.value != confirmPassword.value )
        {
          newPassword.value="";
          confirmPassword.value="";
          newPassword.focus();
          document.getElementById("confirm_password").innerHTML = "not the same!";
          output = false;
        }
        return output;
      }
    </script>
  </body>
</html>
