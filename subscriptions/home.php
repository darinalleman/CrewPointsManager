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
      <h4 class="header center blue-text">Subscriptions</h1>
      <div class="row center">
        <h5 class="header col s12 light">Subscribe to our email updates to stay in the loop about all crew events!</h5>
      </div>
      <div class="row center">
        <div style="width:50%; margin:auto;">
            <?php
            //if "email" variable is filled out, send email
            if (isset($_REQUEST['email']))  {
              $email = $_REQUEST['email'];
              $crypt = openssl_encrypt($email, "aes-256-ctr", "7d49782f2d2e465a");
              $admin_email = "crews-no-reply@cs.ship.edu";
              $subject = "Confirm your Ship CS Department Crews subscription";

              $body = "
              Confirm your subscription: 
              
              webprog.cs.ship.edu/webprog29/subscriptions/confirm.php?email=".$crypt."
              
              If you did not request this email, you can safely ignore it.
              

              Unsubscribe: webprog.cs.ship.edu/webprog29/subscriptions/unsub.php?email=".$crypt."
              ";
            
              //send email
              mail($email, "$subject", $body, "From:" . $admin_email);
            
              //Email response
              echo "<p>Check your email for a confirmation link.</p><br><br><br><br>";
            }
            else{
              echo "
            <form method=\"post\">
                <input name=\"email\" placeholder=\"Your email address\" type=\"email\" />
                <input class=\"btn-large waves-effect waves-light light-blue\" type=\"submit\" value=\"Subscribe\" />
            </form>";
            }
          ?>
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
