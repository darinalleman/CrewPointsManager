<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Ship Cycling</title>
  
  
  <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/Dogfalo/materialize/master/dist/css/materialize.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<body>
    <header>
          <nav class="light-blue darken-3" role="navigation">
            <div  style="width:100%" class="nav-wrapper container"><a id="logo-container" href="../" class="brand-logo">Ship Cycling</a>
              <ul class="right hide-on-med-and-down">
                <li><a onclick="location.href=''" >Scurry</a></li>
                <li><a onclick="location.href='../smss/'" >SMSS</a></li>
                <li><a onclick="location.href='../members/'" >Members</a></li>
                <li><a onclick="location.href=''" >Contact</a></li>
              </ul>

              <ul id="nav-mobile" class="side-nav">
                <li><a onclick="location.href=''" >Scurry</a></li>
                <li><a onclick="location.href='../smss/'" >SMSS</a></li>
                <li><a onclick="location.href='../members/'" >Members</a></li>
                <li><a onclick="location.href='" >Contact</a></li>
                <hr>
              </ul>
              <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
          </nav>
    </header>
<main>
    <div class="container contact">
    <br>
        <h5>contact</h5>
        <h6>Get in touch with Ship Cycling</h6>
        <hr>
        <div class="row">
          <div class="col s12 m6 l6">
            <div class="row">
              <form class="col s12" id="emailform" method="post">
                <div class="row">
                  <div class="input-field col s6">
                    <input id="first" name="first" type="text" class="validate">
                    <label for="first">First Name</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="last" name="last" type="text" class="validate">
                    <label for="last">Last Name</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">E-Mail</label>
                  </div>
                </div>
                <textarea id="message" name="message" class="materialize-textarea" placeholder="Your Message" required></textarea>
                <input id="validate" class="btn-large waves-effect waves-light light-blue" type="submit" value="Submit" />
              </form>
                <?php include 'sendEmail.php'; ?>

            </div>
          </div>
          <div class="col s12 m6 l6 contact-holder">
            <h6 class="mdi-action-home">Address</h6>
            <p><a href="https://www.google.com/maps/place/1871+Old+Main+Dr,+Shippensburg,+PA+17257" target="_blank">1871 Old Main Drive, Shippensburg PA 17257</a></p>
            <h6 class="mdi-hardware-phone-android">email</h6>
            <p><a href="mailto:shipcycling@gmail.com">shipcycling@gmail.com</a></p>
          </div>
        </div>
      </div>
</main>

        <footer class="brown">
        <br>
          <div class="footer-copyright">
            <div class="container white-text">
            © 2016 Copyright Shippensburg University Cycling Club
            </div>
          </div>
            <div class="footer-copyright">
              <div class="container white-text lighten-3">
              Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
              </div>
            </div>
            <br>
        </footer>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdn.rawgit.com/Dogfalo/materialize/master/dist/js/materialize.min.js'></script>

    <script src="../js/index.js"></script>

</body>
</html>
