<?php
  // Nick Martinez - Final Project
  require_once('functions.php');
  require_once('user_gateway.php');

  secureSession();

  if( isset($_POST['login']) )
  {
    $safe_email = htmlentities($_POST['email']);
    $user = fetchUser($safe_email);

    if( !$user )
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
            $message = "Invalid email / password. Try again.";
            echo("<script type='text/javascript'>alert($message);</script>");
      die("You are now logged in. Please <a href='../index.php'>" .
        "click here</a> to continue.<br><br>");
    } else
    {
      // nope.
      $message = "Invalid email / password. Try again.";
      echo("<script type='text/javascript'>alert($message);</script>");
      header('Location:login_page.php');
      die();
    }
  }
?>
