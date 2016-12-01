<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Subscriptions</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
</head>
<body>
  <nav class="orange" role="navigation">
    <div  style="width:100%" class="nav-wrapper container"><a id="logo-container" 
         href="../" class="brand-logo"><img src=../Ship_logo.png>
      <ul class="right hide-on-med-and-down">
        <li><a onclick="location.href='../teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='../events/home.php'" >Events</a></li>
        <li><a onclick="location.href='home.php'">Subscriptions</a></li>
        <li><a href="../users/home.html"><i class="material-icons left">account_circle</i>Profile</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a onclick="location.href='../teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='../events/home.php'" >Events</a></li>
        <li><a onclick="location.href='home.php'" >Subscriptions</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>


  <div class="section no-pad-bot" id="index-banner">
    <div class="container" style="height:100%">
        <br>
      <h4 class="header center blue-text">Subscribed!</h4>
      <div class="row center">
      <?php
$id = $_GET['email'];

if($id) {
    $decrypted = openssl_decrypt($id, "aes-256-ctr", "7d49782f2d2e465a");
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
        if ($conn->connect_error) die($conn->connect_error);
        else 
        {
            mysqli_query($conn,"INSERT INTO SUBSCRIPTIONS values ('".$decrypted."');");
            echo "<h5 class=\"header col s12 light\">Thank you ".$decrypted." for subscribing to the Crew email updates.</h5>";
            mysqli_commit($conn);
        }
    }
}
else {
    echo '<p>No ID parameter.</p>';
}

?>
      </div>
      <div class="row center">
        <div style="width:50%; margin:auto;">
            <script>

            </script>
        </div>
          
      </div>
      <br><br>

    </div>
  </div>
  

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<script src="../js/init.js"> </script>
  </body>
</html>
