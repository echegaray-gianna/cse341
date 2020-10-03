<?php

include $_SERVER['DOCUMENT_ROOT'] . '/shoppingcart/modules/header.php';
session_start();

$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zipcode = htmlspecialchars($_POST['zipcode']);
$country = htmlspecialchars($_POST['country']);

if (empty($_SESSION['shoppingcart'])) {
    header('location: /shoppingcart/index.php');
}

?>

</header>

<main>

<h1> Thank you for your order </h1>

<h2 class="conf-shipping"> Shipping Address </h2>

<div class="conf-shipping-container">
    <p class='address'> <?= $address ?> <p>
    <p class='city'> <?= $city ?> <p>
    <p class='state'> <?= $state ?> <p>
    <p class='zipcode'> <?= $zipcode ?> <p>
     <p class='country'> <?= $country ?> <p>
</div>

<h2 class="conf-shipping"> Products </h2>


<div class="product-container">

    <table>

        <tr>
            <th class="shop-product-name">
                Product
            </th>

            <th class="shop-product-price">
                Price
            </th>

            <th class="shop-product-quant">
                Quantity
            </th>

            <th class="shop-product-subt">
                Subtotal
            </th>
        </tr>
        <?php

        $grandTotal = 0;
        foreach ($_SESSION['shoppingcart'] as $key => $val) {

            $subTotal = $val['price'] * $val['quant'];
            $grandTotal += $subTotal;

            echo "
                <tr>
                    <form action= '{$_SERVER['PHP_SELF']}' method='POST'>                        
                        <td class= 'shop-img'> 
                            <img src='img/{$val['image']}' class='product-photo' alt='Photo Product Three'>
                            {$val['name']}
                        </td>
                        <td class='shop-price'> {$val['price']} </td>
                        <td class='shop-quant'> {$val['quant']} </td>
                        <td class='shop-subtotal'> $ $subTotal
                        </td>
                    </form>
                </tr>
                <tr>
                    <td colspan= '4' class='shop-grandtotal'> Grand Toral: $grandTotal </td>
                </tr>

            ";
        }

    
        ?>

    </table>




</div>

</main>

<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shoppingcart/modules/footer.php'; ?>

</footer>

<script src="/homepage/script/script.js"></script>

</body>

</html>