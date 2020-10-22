<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';


?>


<main>

<?php
    if(!$_SESSION['loggedin']){
        header('location: /projectone/index.php');
        exit;
    }

    $clientfirstname = $_SESSION ['clientdata'] ['clientfirstname'];
    $clientlastname = $_SESSION ['clientdata'] ['clientlastname'];
    $clientemail = $_SESSION ['clientdata'] ['clientemail'];
    $clienttype = $_SESSION ['clientdata'] ['clienttype'];
    

    echo "<h1> $clientfirstname $clientlastname </h1>
          <h2 class= 'logged_text'> You are logged in. </h2>";

    if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
    }

    echo "<ul class='admin_client_info'>
                <li> First Name: $clientfirstname </li>
                <li> Last Name: $clientlastname </li>
                <li> Email Address: $clientemail </li>
          </ul>
          <p class= 'adm_text'> Use the link below to manage your account. </p>
          <div class= 'admnAccLink'>
                <a href= '/projectone/view/client-update.php' title= 'Update Account Information'> Update Account Information </a>
          </div>" ;



    //Level >1 have the add product link after they login 
    // if ($clientLevel === 'company'){
    //     echo "<div class= 'adm_function'>
    //                 <h2 class = 'adm_funtion_title'> Administrative Functions </h2>
    //                 <p class= 'adm_text'> Use the link below to manage products. </p>
    //                 <div class= 'admnProdLink'>
    //                     <a href='../products/index.php?action=login' title= 'Product'> Products </a> 
    //                 </div> 
    //           </div>";

    // }

    // if (isset($_SESSION['messageReviewTwo'])) {
    //     echo $_SESSION['messageReviewTwo'];
    //     unset($_SESSION['messageReviewTwo']);
    // }
   


?>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>