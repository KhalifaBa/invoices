<?php

$id = $_GET['id'];

include_once 'C:\xampp\htdocs\invoices\inscription\connect.php';
?>
<?php
$sql = "UPDATE ip_invoices SET invoice_status_id = 4,payment_method = 2, is_read_only = 1 WHERE invoice_id = $id";
$sql2 = "UPDATE ip_invoice_amounts SET invoice_balance = 0, invoice_paid = invoice_total WHERE invoice_id = $id";
$rs=$db->prepare($sql);
$rs->execute();
$rs2 = $db->prepare($sql2);
$rs2->execute();

?>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="refresh" content="5;url=http://localhost/invoices/inscription/consultation.php" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
  <style>
    @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
    @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
  </style>
  <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
  <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
  <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
<header class="site-header" id="header">
  <h1 class="site-header__title" data-lead-id="site-header-title">MERCI!</h1>
</header>

<div class="main-content">
  <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
  <p class="main-content__body" data-lead-id="main-content-body">La facture a bien été payé</p>
</div>


</body>
</html>
