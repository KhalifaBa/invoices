<?php
session_start();
include_once 'C:\xampp\htdocs\invoices\connexion.php';
?>
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
<?php


if (isset($_POST['inscription']))
{
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $nom = $_POST['nom'];
    $telephone = $_POST['telephone'];
    $adress = $_POST['adresse'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $password = password_hash($password,PASSWORD_DEFAULT);
    $sqlVerif = "SELECT * FROM ip_clients WHERE client_email = '$email'";
    $result = $db->prepare($sqlVerif);
    $result->execute();


    if ($result->rowCount() == 0)
    {

            $sql = "INSERT INTO `ip_clients` (client_date_created,client_date_modified,`client_name`, `client_address_1`,`client_city`, `client_country`, `client_phone`, `client_email`, `client_password`,`client_language`, `client_active` ) VALUES (current_timestamp,current_timestamp,'$nom','$adress','$ville','$pays','$telephone','$email','$password','system',1);";
            $rs = $db->prepare($sql);
            $rs->execute();

            echo "Merci pour votre inscription";
            echo "<a href='login.php' class='login100-form-btn'>Cliquez-ici pour vous connecter</a>";

        ?>



        <?php



    }

    else
    {
        echo "Vous étes déjà inscrit avec ce mail ";
    }


}


if (isset($_POST['submit']))
{
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $sqlVerif2 = "SELECT * FROM ip_clients WHERE client_email = '$email'";
    $result2 = $db->prepare($sqlVerif2);
    $result2->execute();
    if($result2->rowCount() == 0)
    {
        echo "Vous n'êtes pas encore inscrit <br>";
        echo "<a href='inscription.php' class='login100-form-btn'>Veuillez cliquer ici pour vous inscrire</a>";
    }
    else
    {
        $data = $result2->fetchAll();
        if (password_verify($password,$data[0]["client_password"]))
        {
            $_SESSION['email'] = $email;
            header("Location:consultation.php");
        }else
        {
           echo "Mot de passe incorrect<br>";
            echo "<a href='login.php' class='login100-form-btn'>Veuillez bien entrer le bon mot de passe</a>";
        }
    }
}

