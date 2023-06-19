<?php
$id = $_GET['id'];
require 'config.php';
require 'vendor/autoload.php';
include 'C:\xampp\htdocs\invoices\connexion.php';

$sql = "SELECT * FROM ip_invoices INNER JOIN ip_invoice_amounts ON ip_invoice_amounts.invoice_id = ip_invoices.invoice_id INNER JOIN ip_invoice_items ON ip_invoice_items.invoice_id = ip_invoices.invoice_id WHERE ip_invoices.invoice_id = $id";
$rs=$db->query($sql);
$total = 0;
$nom="";

while($rows=$rs->fetch())
{
    $total =$total + ($rows['item_price']*$rows['item_quantity']-($rows['item_discount_amount']*$rows['item_quantity']));
    $nom = $rows['item_name'];

}
// This is your test secret API key.
\Stripe\Stripe::setApiKey(STRIPE_API_KEY);

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/invoices/inscription';

$checkout_session = \Stripe\Checkout\Session::create([
    'line_items' => [[
        # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
        'price_data' => [
            'currency' => 'USD',
            'unit_amount' => $total. 0 . 0,
            'product_data' => [
                'name' => $nom,
            ],
        ],
        'quantity' => 1 ,
    ]],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/merci.php?id='.$id,
    'cancel_url' => $YOUR_DOMAIN . '/fail.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
?>
