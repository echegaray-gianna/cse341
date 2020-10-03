<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shoppingcart/modules/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/shoppingcart/modules/nav.php';

session_start();

if (empty($_SESSION['shoppingcart'])) {
    header('location: /shoppingcart/index.php');
}

?>



<h1> Checkout </h1>

<h3> Please complete the following information </h3>

<form action="confirmation.php" method="POST" class="checkout-form">

    <label for="address"> Address</label>
    <input type="text" id="address" class="address" name="address" placeholder="Street" size= '55' required>
    <br>

    <label for="city">City</label>
    <input type="text" id="city" class="city" name="city" placeholder="City" required>


    <label for="state">State</label>
    <input type="text" id="state" class="state" name="state" placeholder="City" required>
    <br>

    <label for="zipcode">Zipcode</label>
    <input type="text" id="zipcode" name="zipcode" pattern="[0-9]*" placeholder="13593" required>


    <label for="country">Country</label>
    <input type="text" id="country" class="country" name="country" placeholder="Country" required>
    <br>

    <input type="submit" value="| Porcess checkout |" class='btn-checkout'>

</form>

<div class="links">
    <a href="shoppingcart.php"> | Return to Cart |</a>
</div>


</div>

</main>

<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shoppingcart/modules/footer.php'; ?>

</footer>

<script src="/homepage/script/script.js"></script>


</body>

</html>