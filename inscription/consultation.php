<?php
session_start();
include_once 'C:\xampp\htdocs\invoices\connexion.php';

if (empty($_SESSION['email']))
{
    header("Location:login.php");
}
$email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Consultation</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->


    <link rel="stylesheet" href="css/consultation.css">
    <!--===============================================================================================-->
</head>
<body>
<div class="container">
    <input class="button-3" type="button" onclick="window.location.href='logout.php'" value="Se déconnecter"/>

            <p>Vos factures</p>

                <table>
                    <thead  class="styled-table">
                    <tr>
                        <th> ID_Facture</th>
                        <th>  Date  </th>

                        <th>  Échéance  </th>
                        <th>Montant</th>
                        <th>  Status  </th>
                        <th></th>
                        <th></th>

                    </tr>
                    </thead>
                    <?php
                    $sql =" SELECT * FROM ip_clients INNER JOIN ip_invoices ON ip_clients.client_id = ip_invoices.client_id INNER JOIN ip_invoice_amounts ON ip_invoice_amounts.invoice_id = ip_invoices.invoice_id WHERE ip_clients.client_email = '$email'";
                    $rs = $db->query($sql);
                    if ($rs->rowCount()>0)
                    {
                        while ($rows = $rs->fetch())
                        {
                            ?>

                            <tr>
                                <td><?=$rows['invoice_id']?></td>
                                <td><?=$rows['invoice_date_created']?></td>
                                <td><?=$rows['invoice_date_due']?></td>
                                <td><?=$rows['invoice_total']?> $</td>
                                <?php
                                if ($rows['invoice_status_id']==2)
                                {
                                    ?>
                                    <td>Envoyé</td>
                                    <td><input class="button-3" type="button" onclick="window.location.href='recap.php?id=<?=$rows['invoice_id']?>'" value="Payer"/></td>
                                <?php
                                }elseif ($rows['invoice_status_id']==1)
                                {
                                ?>
                                    <td>Brouillon</td>
                                 <?php
                                }elseif ($rows['invoice_status_id']==3)
                                {
                                    ?>

                                    <td>Consulté</td>
                                    <td><input class="button-3" type="button" onclick="window.location.href='recap.php?id=<?=$rows['invoice_id']?>'" value="Payer"/></td>

                                    <?php
                                }else {
                                ?>
                                    <td>Payé</td>
                                <?php
                                }

                                ?>

                                <td><input class="button-2" type="submit" onclick="window.location.href='http://localhost/invoices/index.php/guest/view/invoice/<?=$rows['invoice_url_key']?>';" value="Consulter"/></td>

                            </tr>

                    <?php
                        }
                    }

                    ?>
                </table>



</div>
</body>
</html>
