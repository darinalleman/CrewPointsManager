<?php
  // Nick Martinez - Final Project
  require_once('functions.php');
  require_once('user_gateway.php');

  secureSession();

  // user logging out
  if( isset($_POST['logout']) )
  {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 42000, $params["path"],
      $params["domain"], $params["secure"], $params["httponly"]);
    session_destroy();
  } else if( isset($_POST['login']) ) // user logging in
  {
    $safe_email = htmlentities($_POST['email']);
    $user = fetchUser($safe_email);
    if( !$user ) echo("Invalid username/password combination. <br />");
    if( password_verify($_POST['password'], $user['password']) )
    {
      echo "Logged In!";
      $_SESSION['email'] = $safe_email;
    } else
    {
      echo("Invalid username/password combination. <br />");
    }
  }
?>
