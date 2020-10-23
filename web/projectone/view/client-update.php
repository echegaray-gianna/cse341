
<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; ?>

<main>

<?php
//Only allow access to the view if client is logged in
if ($_SESSION['loggedin']= FALSE) {
    header('location: /projectone/index.php');
    exit;
}

$clientInfoAcc = $_SESSION['clientdata'];

if (isset($clientInfoAcc['clientfirstname'])) { 
    $page_title = "Update $clientInfoAcc[clientfirstname]'s Account ";
  
  } elseif (isset($clientfirstname)) { 
    echo $clientfirstname; 
  };
  
?>

<h1>
    <?php
    echo "Update Account";

    ?>
</h1>

<p class="prod_text">All fields are required </p>


<form action="/project/process/process-update-info.php" method="POST" name="account_reg" class="form_login">

    <p class="field_name"> Use this form to update your name or email information </p>

    <div class="message">
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
    </div>

    <fieldset class="form_registration_container">

        <label for="clientfirstname">
            <span> First Name</span>
            <input type="text" id="clientfirstname" name="clientfirstname" placeholder="Name" <?php if (isset($clientfirstname)) {
                                                                                                    echo "value='$clientfirstname'";
                                                                                                } elseif (isset($clientInfoAcc['clientfirstname'])) {
                                                                                                    echo "value= '$clientInfoAcc[clientfirstname]'";
                                                                                                }  ?> required>
        </label>

        <label for="clientlastname">
            <span>Last Name</span>
            <input type="text" id="clientlastname" name="clientlastname" placeholder="Last Name" <?php if (isset($clientlastname)) {
                                                                                                        echo "value='$clientlastname'";
                                                                                                    } elseif (isset($clientInfoAcc['clientlastname'])) {
                                                                                                        echo "value= '$clientInfoAcc[clientlastname]'";
                                                                                                    }  ?> required>
        </label>

        <label for="clientemail">
            <span>Email</span>
            <input type="email" id="clientemail" name="clientemail" placeholder="Email" <?php if (isset($clientemail)) {
                                                                                            echo "value='$clientemail'";
                                                                                        } elseif (isset($clientInfoAcc['clientemail'])) {
                                                                                            echo "value= '$clientInfoAcc[clientemail]'";
                                                                                        }  ?> required>
        </label>

        <input type="submit" name="submit" class="logbtn" value="Update Account">
        <input type="hidden" name="clientid" value="<?php if (isset($clientInfoAcc)) {
                                                        echo $clientInfoAcc['clientid'];
                                                    } elseif (isset($clientid)) {
                                                        echo $clientid;
                                                    } ?>">

    </fieldset>
</form>


</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>