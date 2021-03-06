<?php

require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";
session_start();

$db = getdb();

try {

    $clientfirstname = htmlspecialchars($_POST['clientfirstname']);
    $clientlastname = htmlspecialchars($_POST['clientlastname']);
    $clientemail = htmlspecialchars($_POST['clientemail']);
    $clientid = htmlspecialchars($_POST['clientid']);

    $clientemail = checkEmail($clientemail);

    //Check if the email is the same as the logged account
    if ($clientemail != $_SESSION['clientdata']['clientemail']) {
        //Unique Registration Check - Check for existing email address in the table
        $existingEmail = checkExistingEmail($clientemail);
        // if exist...
        if ($existingEmail) {
            $message = '<p class="notify">That email address already exists.</p>';
            include '../view/client-update.php';
            exit;
        }
    }

    // Check for missing data

    if (empty($clientfirstname) || empty($clientlastname) || empty($clientemail)) {
        $message = '<p class="notify"> Please provide information for all empty form fields.</p>';
        include '../view/client-update.php';
        exit;
    }

    $updateInfo = updateClientAcc(
        $clientfirstname,
        $clientlastname,
        $clientemail,
        $clientid
    );

    if ($updateInfo) {

        $messageUpd = "<p class= 'notice'> $clientfirstname, your account information was updated. </p>";
        $_SESSION['messageUpd'] = $messageUpd;
        $_SESSION['clientdata'] = getAccountInfo($clientid);

    
        header('location: /projectone/account-index/index.php');

        exit;
    } else {
        $messageUpd = "<p class= 'notice> Sorry, but we couldnt update $clientfirstname's account information. Please try again.</p>";
        $_SESSION['messageUpd'] = $messageUpd;
  
        include '../view/client-update.php';
        exit;
    }

} catch (Exception $ex) {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}
