<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inscription</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
  <div class="container-login100">
    <div class="wrap-login100">
      <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Inscription
					</span>
      </div>

      <form class="login100-form validate-form" method="post" action="connect.php">
        <div class="wrap-input100 validate-input m-b-26" data-validate="Veuillez entrer un e-mail">
          <span class="label-input100">E-mail</span>
          <input class="input100" type="text" name="mail" placeholder="Entrez un e-mail">
          <span class="focus-input100"></span>
        </div>
          <div class="wrap-input100 validate-input m-b-26" data-validate="Veuillez entrer un nom">
              <span class="label-input100">Nom</span>
              <input class="input100" type="text" name="nom" placeholder="Entrez un nom">
              <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 validate-input m-b-26" data-validate="Veuillez entrer un numéro de téléphone">
              <span class="label-input100">Téléphone</span>
              <input class="input100" type="text" name="telephone" placeholder="Entrez un numéro de téléphone">
              <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 validate-input m-b-26" data-validate="Veuillez entrer une adresse">
              <span class="label-input100">Adresse</span>
              <input class="input100" type="text" name="adresse" placeholder="Entrez une adresse">
              <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 validate-input m-b-26" data-validate="Veuillez entrer une ville">
              <span class="label-input100">Ville</span>
              <input class="input100" type="text" name="ville" placeholder="Entrez une ville">
              <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 validate-input m-b-26" data-validate="Veuillez entrer un pays">
              <span class="label-input100">Pays</span>
              <input class="input100" type="text" name="pays" placeholder="Entrez une pays">
              <span class="focus-input100"></span>
          </div>

        <div class="wrap-input100 validate-input m-b-18" data-validate = "Veuillez entrer un mot de passe">
          <span class="label-input100">Mot de passe</span>
          <input class="input100" type="password" name="pass" placeholder="Mot de passe est requis">
          <span class="focus-input100"></span>
        </div>

        <div class="flex-sb-m w-full p-b-30">


          <div>
            <a href="login.php" class="txt1">
              Déjà inscrit ? Connecte-toi ici
            </a>
          </div>
        </div>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn" name="inscription">
            Inscription
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
