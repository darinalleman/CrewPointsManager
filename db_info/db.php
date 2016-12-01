<?php
    $conn = null;
    if (file_exists("../db_info/db_login_info.txt"))
    {
        //open my secret file that has the username on the first line
        $fh = fopen("../db_info/db_login_info.txt","r");
        $user_name = fgets($fh);
        //and the password on the second line
        $pwd = fgets($fh);
        fclose($fh);
        //clean up the input
        $user_name = trim(preg_replace('/\R+/', ' ',$user_name));
        $pwd = trim(preg_replace('/\R+/', ' ',$pwd));
        $db_host = 'webprog.cs.ship.edu';
        $db = 'webprog29';
        //connect to the database
        $conn = new mysqli($db_host,$user_name,$pwd,$db);
    }
?>
