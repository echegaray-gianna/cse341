<?php

require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";
session_start();

$db = getdb();

try {

    $clientfirstname = htmlspecialchars ($_POST['clientfirstname']);
    $clientlastname = htmlspecialchars ($_POST['clientlastname']);
    $clientemail = htmlspecialchars ($_POST['clientemail']);
    $clientid = htmlspecialchars ($_POST['clientid']);

    $clientemail = checkEmail($clientemail);

     //Check if the email is the same as the logged account
    if ($clientemail != $_SESSION ['clientdata']['clientemail']) {
        //Unique Registration Check - Check for existing email address in the table
        $existingEmail = checkExistingEmail($clientemail);
        // if exist...
        if ($existingEmail) {
          $message = '<p class="notice">That email address already exists.</p>';
          include '../view/client-update.php';
          exit;
        }
    }

    // Check for missing data

    if (empty($clientfirstname) || empty($clientlastname) || empty($clientemail)) {
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/registration.php';
        exit;
    }

    //Update info

    function updateClientAcc ( $clientfirstname, $clientlastname, $clientemail, $clientid ) {

        $db = getdb();
        $sql = 'UPDATE client 
                SET clientfirstname = :clientfirstname, clientlastname = :clientlastname,
                    clientemail =:clientemail
                WHERE clientid =:clientid';

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':clientfirstname', $clientfirstname);
        $stmt->bindValue(':clientlastname', $clientlastname);
        $stmt->bindValue(':clientemail', $clientemail);
        $stmt->bindValue(':clientid', $clientid);

        $stmt->execute();

        $rowsChanged = $stmt->rowCount();
        // Close the database interaction
        $stmt->closeCursor();
        // Return the indication of success (rows changed)
        return $rowsChanged;
    }    

    $message = "<p class= 'notify'> $clientfirstname, your account information was updated. </p>";
    $_SESSION['message'] = $message;
    $_SESSION['clientData'] = getAccountInfo($clientid);

    header('location: /projectone/view/admin.php');

    exit;
 



}catch (Exception $ex)
{
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}