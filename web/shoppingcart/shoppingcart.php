<?php

include $_SERVER['DOCUMENT_ROOT'] . '/shoppingcart/modules/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/shoppingcart/modules/nav.php';

session_start();

//Initialization shopping cart
if (!(isset($_SESSION["shoppingcart"]))) {
    $_SESSION['shoppingcart'] = array();
}

//clear shopping cart
if (isset($_GET['clear'])) {
    $_SESSION['shoppingcart'] = array();
}

if (isset($_POST['pId'])) {
    $pId = htmlspecialchars($_POST['pId']);
    $quant = htmlspecialchars(filter_input(INPUT_POST, "quant", FILTER_VALIDATE_INT));
    $price = htmlspecialchars($_POST['price']);

    if ($quant > 0) {
        $_SESSION['shoppingcart'][$pId]['quant'] = $quant;
        $_SESSION['shoppingcart'][$pId]['price'] = $price;
        $message = "<p class='notification'> Your product was updated <p>";
        $_SESSION['message'] = $message;

    } elseif ($quant== '0') { 
        unset($_SESSION['shoppingcart'][$pId]);
        $message = "<p class='notification'> Your product was deteled <p>";
        $_SESSION['message'] = $message;

    } else {
        $message = "<p class='notification'> Please enter a valid amount <p>";
        $_SESSION['message'] = $message;
    }
}
?>

<h1> Cart </h1>

<?php

if (isset($message)) {
    echo $message;
}
?>

<h4> **If you want to delete a product, make the quantity "0" </h4>
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
                        <td class='shop-price'> $ {$val['price']}
                            <input type='hidden' name='price' id='price' value='{$val['price']}'>
                        </td>
                        <td>
                            <input type='text' name='quant' id='quant' value= '{$val['quant']}' size='3'>
                            <input type='hidden' name='pId' id='pId' value= '$key'>                                
                            <input type='submit' value= 'Update Cart' class='btn-upd'>
                        </td>
                        <td> $ $subTotal </td>
                    </form>
                </tr>
            ";
        }

        if (empty($_SESSION['shoppingcart'])) {
            echo "<tr><td colspan= '4' class='shop-empty'> Cart is empty </td></tr>";
        } else {
            echo "<tr><td colspan= '4' class='shop-grandtotal'> Grand Toral: $grandTotal </td></tr>";
        }

        ?>

    </table>
    <br>
    <div class="links">
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?clear=1">Clear Cart  &nbsp; &nbsp; &nbsp;|</a> 
        <a href="index.php">Add more product  &nbsp; &nbsp; &nbsp; |</a>
        <a href="checkout.php">Checkout</a>

    </div>

</div>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shoppingcart/modules/footer.php'; ?>

</footer>

<script src="/homepage/script/script.js"></script>


</body>

</html>