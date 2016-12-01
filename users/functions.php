<?php
  // Nick Martinez - Final Project

  /**
   * Starts a session in a secure way.
   */
  function secureSession()
  {
    $session_name = 'my_little_session';
    session_name($session_name);

    $secure = true;
    $httponly = true;
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
      $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

    session_start();
    session_regenerate_id(true);
  }

  /**
   * Returns the logged in status of the user.
   */
  function isLoggedIn()
  {
    if( isset($_SESSION['email']) )
    {
      return true;
    }
    return false;
  }
?>
