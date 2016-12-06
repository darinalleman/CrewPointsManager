<?php
  // Nick Martinez - Final Project
  require_once('functions.php');

  $_SESSION = array();
  setcookie(session_name(), '', time() - 42000, $params["path"],
    $params["domain"], $params["secure"], $params["httponly"]);
  session_destroy();

  header('Location:../index.php');
?>
