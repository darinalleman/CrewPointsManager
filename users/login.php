
<?php
  // Nick Martinez - Final Project
  require_once('functions.php');
  require_once('user_gateway.php');

  secureSession();
  if( isset($_POST['email']) && isset($_POST['password']))
  {
    $safe_email = htmlentities($_POST['email']);
    $user = fetchUser($safe_email);

    if( empty($user) )
    {
      // nope.
      $message = "Invalid email / password. Try again.";
      echo("<script type='text/javascript'>alert($message);</script>");
      header('Location:login_page.php');
    }

    if( password_verify($_POST['password'], $user['password']) )
    {
      // yep.
      $_SESSION['email'] = $safe_email;
      echo "logged in sucker";
      echo("<script type='text/javascript'>alert('Logged in!')</script>");
      //header('Location:../index.php');
    } else
    {
      // nope.
      echo "failure in the worst way";
      //$message = "Invalid email / password. Try again.";
      //echo("<script type='text/javascript'>alert($message);</script>");
      //header('Location:login_page.php');
    }
  }
?>
