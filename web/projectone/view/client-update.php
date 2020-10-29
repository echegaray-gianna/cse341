<?php
require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";

session_start();


include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';



$updateInfo = updateClientAcc(
    $clientfirstname,
    $clientlastname,
    $clientemail,
    $clientid
);

?>

<main>

    <?php
    //Only allow access to the view if client is logged in
    if ($_SESSION['loggedin'] = FALSE) {
        header('location: /projectone/index.php');
        exit;
    }

    $clientInfoAcc = $_SESSION['clientdata'];

    if (isset($clientInfoAcc['clientfirstname'])) {
        $page_title = "Update $clientInfoAcc[clientfirstname]'s Account ";
    } else if (isset($clientfirstname)) {
        echo $clientfirstname;
    };

    ?>

    <h1>
        <?php
        echo "Update Account";
        ?>
    </h1>

    <form action="/projectone/process/process-update-info.php" method="POST" name="account_reg" class="form update">

        <p class="field_name"> Use this form to update your information </p>
        <p class="prod_text">**All fields are required </p>

        <div class="message">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </div>

        <fieldset class="form_update_container">

            <label for="clientfirstname">
                <span> First Name</span>
                <input type="text" id="clientfirstname" name="clientfirstname" placeholder="Name" <?php if (isset($clientfirstname)) {
                                                                                                        echo "value='$clientfirstname'";
                                                                                                    } elseif (isset($clientInfoAcc['clientfirstname'])) {
                                                                                                        echo "value= '$clientInfoAcc[clientfirstname]'";
                                                                                                    }  ?> required>
            </label>

            <br>

            <label for="clientlastname">
                <span>Last Name</span>
                <input type="text" id="clientlastname" name="clientlastname" placeholder="Last Name" <?php if (isset($clientlastname)) {
                                                                                                            echo "value='$clientlastname'";
                                                                                                        } elseif (isset($clientInfoAcc['clientlastname'])) {
                                                                                                            echo "value= '$clientInfoAcc[clientlastname]'";
                                                                                                        }  ?> required>
            </label>

            <br>

            <label for="clientemail">
                <span class="update-email">Email</span>
                <input type="email" id="clientemail" name="clientemail" placeholder="Email" <?php if (isset($clientemail)) {
                                                                                                echo "value='$clientemail'";
                                                                                            } elseif (isset($clientInfoAcc['clientemail'])) {
                                                                                                echo "value= '$clientInfoAcc[clientemail]'";
                                                                                            }  ?> required>
            </label>

            <br>

            <input type="submit" name="submit" class="btn update" value="Update Account">
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