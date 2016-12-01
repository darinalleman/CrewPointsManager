<?php
    require_once 'db_login_info.php';
    $user_name = $usernameStored;
    $pwd = $passwordStored;
    $db_host = 'webprog.cs.ship.edu';
    $db = 'webprog29';
    $conn = new mysqli($db_host,$user_name,$pwd,$db);
?>
