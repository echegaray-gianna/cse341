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
    $name = htmlspecialchars($_POST['name']);
    $image = htmlspecialchars($_POST['image']);
    $price = htmlspecialchars($_POST['price']);

    if ($quant > 0) {
        if (isset($_SESSION['shoppingcart'][$pId])) {

            $_SESSION['shoppingcart'][$pId]['quant'] += $quant;

            $messageT = "<p class='notificationT'> $quant - '$name' - added to cart <p>";
            $_SESSION['messageT'] = $messageT;
        
        } else {
            $_SESSION['shoppingcart'][$pId]['quant'] = $quant;
            $_SESSION['shoppingcart'][$pId]['name'] = $name;
            $_SESSION['shoppingcart'][$pId]['image'] = $image;
            $_SESSION['shoppingcart'][$pId]['price'] = $price;

            $messageT = "<p class='notificationT'> $quant - '$name' - added to cart <p>";
            $_SESSION['messageT'] = $messageT;
        }

    } else {

        $message = "<p class='notification'> Please enter a valid amount <p>";
        $_SESSION['message'] = $message;

    }
}

?>



<h1> Home </h1>

<?php

if (isset($messageT)) {
    echo $messageT;
}
?>

<h2>Tops</h2>
<?php

if (isset($message)) {
    echo $message;
}
?>

<div class="product-container">

    <div class="product">
        <h3 class="prod-name"> Cotton Candy Boyfriend Tee </h3>
        <div class="prod-img"> <img src="img/productone.jpg" class="product-photo" alt="Cotton Candy Boyfriend Tee"> </div>
        <p class="prod-price"> $15.99 </p>
        <div class="form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" name="quant" id="quant" size="3">
                <input type="hidden" name="pId" id="pId" value="1">
                <input type="hidden" name="name" id="name" value="Cotton Candy Boyfriend Tee">
                <input type="hidden" name="image" id="image" value="productone.jpg">
                <input type="hidden" name="price" id="price" value="20.99">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
    </div>

    <div class="product">
        <h3 class="prod-name"> Cropped Pullover </h3>
        <div class="prod-img"> <img src="img/producttwo.jpg" class="product-photo" alt="Cropped Pullover"> </div>
        <p class="prod-price"> $29.99 </p>
        <div class="prod-form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" name="quant" id="quant" size="3">
                <input type="hidden" name="pId" id="pId" value="2">
                <input type="hidden" name="name" id="name" value="Cropped Pullover">
                <input type="hidden" name="image" id="image" value="producttwo.jpg">
                <input type="hidden" name="price" id="price" value="15.99">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
    </div>

    <div class="product">
        <h3 class="prod-name"> Los Angeles Graphic Tee </h3>
        <div class="prod-img"> <img src="img/productthree.jpg" class="product-photo" alt="Los Angeles Graphic Tee"> </div>
        <p class="prod-price"> $15.99 </p>
        <div class="prod-form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" name="quant" id="quant" size="3">
                <input type="hidden" name="pId" id="pId" value="3">
                <input type="hidden" name="name" id="name" value="Los Angeles Graphic Tee">
                <input type="hidden" name="image" id="image" value="productthree.jpg">
                <input type="hidden" name="price" id="price" value="10.99">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
    </div>

    <div class="product">
        <h3 class="prod-name"> Seraphina V-Neck </h3>
        <div class="prod-img"> <img src="img/productfour.jpg" class="product-photo" alt="Seraphina V-Neck"> </div>
        <p class="prod-price"> $35.99 </p>
        <div class="prod-form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" name="quant" id="quant" size="3">
                <input type="hidden" name="pId" id="pId" value="4">
                <input type="hidden" name="name" id="name" value="Seraphina V-Neck">
                <input type="hidden" name="image" id="image" value="productfour.jpg">
                <input type="hidden" name="price" id="price" value="20.99">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
    </div>

    <div class="product">
        <h3 class="prod-name"> Life is Short Graphic Tee</h3>
        <div class="prod-img"> <img src="img/productfive.jpg" class="product-photo" alt="Life is Short Graphic Tee"> </div>
        <p class="prod-price"> $18.99 </p>
        <div class="prod-form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" name="quant" id="quant" size="3">
                <input type="hidden" name="pId" id="pId" value="5">
                <input type="hidden" name="name" id="name" value="Life is Short Graphic Tee">
                <input type="hidden" name="image" id="image" value="productfive.jpg">
                <input type="hidden" name="price" id="price" value="20.99">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
    </div>


    <div class="product">
        <h3 class="prod-name"> Earth Graphic Tee </h3>
        <div class="prod-img"> <img src="img/productsix.jpg" class="product-photo" alt="Earth Graphic Tee"> </div>
        <p class="prod-price"> $20.99 </p>
        <div class="prod-form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" name="quant" id="quant" size="3">
                <input type="hidden" name="pId" id="pId" value="6">
                <input type="hidden" name="name" id="name" value="Earth Graphic Tee">
                <input type="hidden" name="image" id="image" value="productsix.jpg">
                <input type="hidden" name="price" id="price" value="20.99">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
    </div>


</div>


</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shoppingcart/modules/footer.php'; ?>

</footer>

<script src="/homepage/script/script.js"></script>


</body>

</html>