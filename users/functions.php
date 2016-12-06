<?php
  // Nick Martinez - Final Project
  // These are useful functions needed for the user management system.

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

  /**
   * Validates that an email is of the correct format.
   * Example: somebody@somewhere.something
   */
  function validateEmail($email)
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  /**
   * Validates a password.
   * At least one capital letter, at least one digit, 6-10 characters long.
   */
  function validatePassword($password)
  {
    $regex = '/^(?=\w{6,10}$)(?=[^a-z]*[a-z])(?=(?:[^A-Z]*[A-Z]){1})\D*\d.*$/';
    return preg_match($regex, $password);
  }
?>
