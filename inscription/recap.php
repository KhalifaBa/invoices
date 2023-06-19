<?php

$id = $_GET['id'];
require_once 'config.php';
include_once 'C:\xampp\htdocs\invoices\inscription\connect.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/recap.css">
<title>Récapitulatif</title>
</head>
<body>
<div class="container">
    <table>
        <tr>
            <th><p><b>Quantité</b></p></th>
            <th><p><b>Produit</b></p></th>
            <th><p><b>Prix</b></p></th>
        </tr>

    <?php
    $sql = "SELECT * FROM ip_invoices INNER JOIN ip_invoice_amounts ON ip_invoice_amounts.invoice_id = ip_invoices.invoice_id INNER JOIN ip_invoice_items ON ip_invoice_items.invoice_id = ip_invoices.invoice_id WHERE ip_invoices.invoice_id = $id";
    $rs=$db->query($sql);
    $total = 0;
    $prix = 0;
    $nom="";
    $quantité = 0;
    if ($rs->rowCount()>0)
    {
        while($rows = $rs->fetch())
        {
            $total =$total + ($rows['item_price']*$rows['item_quantity']);
            ?>
            <tr>
                <td>x <?=$quantité=round($rows['item_quantity'])?></td>
                <td><?=$nom= $rows['item_name']?></td>
                <td><?=$prix=$rows['item_price']?> €</td>
            </tr>

    <?php
        }
    }



    ?>
    </table>
    <hr>
    <div id="paypal-button-container"></div>
    <hr>
    <div id='revolut-pay'></div>
    <hr>
    <div id="stripe">
        <a href="pay.php?id=<?=$id?>">Payer avec stripe</a>

    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=AekowFQrsCCUDVMRRZLzz88AB93CzKLuNq4lwnAlXY9u8aVSUxuLIRX6CLrt_cjsg4K3EnkHCnXqXHNp&currency=EUR"></script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?=$total?>'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Merci pour votre achat !' + details.payer.name.given_name);
                window.location.href = 'merci.php?id=<?=$id?>'

            });
        }
    }).render('#paypal-button-container');
</script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Set Stripe publishable key to initialize Stripe.js
    const stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

    // Select payment button
    const payBtn = document.querySelector("#stripe");

    // Payment request handler
    payBtn.addEventListener("click", function (evt) {
        setLoading(true);

        createCheckoutSession().then(function (data) {
            if(data.sessionId){
                stripe.redirectToCheckout({
                    sessionId: data.sessionId,
                }).then(handleResult);
            }else{
                handleResult(data);
            }
        });
    });

    // Create a Checkout Session with the selected product
    const createCheckoutSession = function (stripe) {
        return fetch("payment_init.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                createCheckoutSession: 1,
            }),
        }).then(function (result) {
            return result.json();
        });
    };

    // Handle any errors returned from Checkout
    const handleResult = function (result) {
        if (result.error) {
            showMessage(result.error.message);
        }

        setLoading(false);
    };
    </script>

<script>

    import RevolutCheckout from '@revolut/checkout'

    RevolutCheckout.payments({
        publicToken: 'oa_sand_ou62z7MYBJO9Kcq3y6NHW7hqBpO8M81TAyVdq9y6T40' // merchant public API key
    }).then((paymentInstance) => {
        const revolutPay = paymentInstance.revolutPay

        const paymentOptions = {
            currency: 'USD',
            totalAmount: 1000,

            // For more information, see: https://developer.revolut.com/docs/merchant/create-order

            createOrder: yourServerSideCall().then((order) => ({
                publicId: order.public_id,
            })),
            // You can put other optional parameters here
        }

        revolutPay.mount(document.getElementById('revolut-pay'), paymentOptions)

        revolutPay.on('payment', (event) => {
            switch (event.type) {
                case 'cancel': {
                    if (event.dropOffState === 'payment_summary') {
                        log('what a shame, please complete your payment')
                    }
                    break
                }

                case 'success':
                    onSuccess()
                    break

                case 'error':
                    onError(event.error)
                    break
            }

            revolutPay.mount(document.getElementById('revolut-pay'), paymentOptions)

            revolutPay.on('payment', (event) => {
                switch (event.type) {
                    case 'cancel': {
                        if (event.dropOffState === 'payment_summary') {
                            log('what a shame, please complete your payment')
                        }
                        break
                    }

                    case 'success':
                        onSuccess()
                        break

                    case 'error':
                        onError(event.error)
                        break
                }
            })
        })
</script>
</body>
</html>
