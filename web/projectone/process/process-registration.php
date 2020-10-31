<?php 

require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";
session_start();

 $db = getdb();


 try {

        $clientfirstname = htmlspecialchars ($_POST['clientfirstname']);
        $clientlastname = htmlspecialchars ($_POST['clientlastname']);
        $clientemail = htmlspecialchars ($_POST['clientemail']);
        $clientpassword = htmlspecialchars ($_POST['clientpassword']);
        $clienttype = htmlspecialchars ($_POST['clienttype']);


        $clientemail = checkEmail($clientemail);
        $checkPassword = checkPassword($clientpassword);

        $existingEmail = checkExistingEmail($clientemail);

        // Check for existing email address in the table
        if ($existingEmail) {
            $message = '<p class="notify">That email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }

        // Check for missing data

        if ($clienttype === 'Choose your Account Type' ){
            $message = '<p class="notify">Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }

        if (empty($clientfirstname) || empty($clientlastname) || empty($clientemail) || empty($checkPassword)) {
            $message = '<p class="notify">Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }

        $hashedPassword = password_hash($clientpassword, PASSWORD_DEFAULT);

        //Insert info

        $sql = 'INSERT INTO client (clientfirstname, clientlastname, clientemail, clientpassword, clienttype)
            VALUES (:clientfirstname, :clientlastname, :clientemail, :clientpassword, :clienttype)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':clientfirstname', $clientfirstname);
        $stmt->bindValue(':clientlastname', $clientlastname);
        $stmt->bindValue(':clientemail', $clientemail);
        $stmt->bindValue(':clientpassword', $hashedPassword);
        $stmt->bindValue(':clienttype', $clienttype);

        $stmt->execute();

        setcookie('firstname', $clientfirstname, strtotime('+1 year'), '/');
        $message = "<p class='notice'>Thanks for registering $clientfirstname. Please use your email and password to login.</p>";
        include '../view/login.php';
        exit;
 

    }catch (Exception $ex)
    {
        // Please be aware that you don't want to output the Exception message in
        // a production environment
        echo "Error with DB. Details: $ex";
        die();
    }

header ('location: /projectone/view/login./php');
