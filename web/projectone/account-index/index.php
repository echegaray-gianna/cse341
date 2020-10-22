<?php
require_once "../connections/dbconnect.php";

$page_title = 'Login';

switch ($action) {

  case 'register':

    require_once "../connections/dbconnect.php";
    $db = getdb();
   
   
    try {
   
       $clientfirstname = htmlspecialchars ($_POST['clientfirstname']);
       $clientlastname = htmlspecialchars ($_POST['clientlastname']);
       $clientemail = htmlspecialchars ($_POST['clientemail']);
       $clientpassword = htmlspecialchars ($_POST['clientpassword']);
       $clienttype = htmlspecialchars ($_POST['clienttype']);
   
   
   
   
       $sql = 'INSERT INTO client (clientfirstname, clientlastname, clientemail, clientpassword, clienttype)
           VALUES (:clientfirstname, :clientlastname, :clientemail, :clientpassword, :clienttype)';
       $stmt = $db->prepare($sql);
       $stmt->bindValue(':clientfirstname', $clientfirstname);
       $stmt->bindValue(':clientlastname', $clientlastname);
       $stmt->bindValue(':clientemail', $clientemail);
       $stmt->bindValue(':clientpassword', $clientpassword);
       $stmt->bindValue(':clienttype', $clienttype);
   
       $stmt->execute();
   
       // $clientid = $db->lastInsertId("clientid_seq");
   
   
   }catch (Exception $ex)
   {
     // Please be aware that you don't want to output the Exception message in
     // a production environment
     echo "Error with DB. Details: $ex";
     die();
   }

   echo 'Thanks for registering. Please use your email and password to login';
    
   include '../view/login.php';











    // // Filter and store the data
    // $clientfirstname = filter_input(INPUT_POST, 'clientfirstname', FILTER_SANITIZE_STRING);
    // $clientlastname = filter_input(INPUT_POST, 'clientlastname', FILTER_SANITIZE_STRING);
    // $clientemail = filter_input(INPUT_POST, 'clientemail', FILTER_SANITIZE_EMAIL);
    // $clientpassword = filter_input(INPUT_POST, 'clientpassword', FILTER_SANITIZE_STRING);
    // $clienttype = filter_input(INPUT_POST, 'clienttype', FILTER_SANITIZE_STRING);

    // //Lesson 7 - Server-side Validation -  connect to functions.php 
    // $clientEmail = checkEmail($clientemail);
    // $checkPassword = checkPassword($clientpassword);


    // //Lesson 8 Unique Registration Check
    // $existingEmail = checkExistingEmail($clientemail);

    // // Check for existing email address in the table
    // if ($existingEmail) {
    //   $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
    //   include '../view/login.php';
    //   exit;
    // }


    // // Check for missing data
    // if (empty($clientfirstname) || empty($clientlastname) || empty($clientemail) || empty($checkpassword) || empty($clienttype)) {
    //   $message = '<p>Please provide information for all empty form fields.</p>';
    //   include '../view/registration.php';
    //   exit;
    // }

    // //   // Hash the checked password
    // //  // $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    //  // Send the data to the model
    //  $regOutcome = regClient($clientfirstname, $clientlastname, $clientemail, $hclientpassword, $clienttype);

    //   // Check and report the result
    //   if ($regOutcome === 1) {
    //     //Lesson 8- Creating a registration Cookie
    //     setcookie('firstname', $clientfirstname, strtotime('+1 year'), '/');
    //     $message = "<p>Thanks for registering $clientfirstname. Please use your email and password to login.</p>";
    //     include '../view/login.php';
    //     exit;

    //     $message = "<p>Thanks for registering $clientfirstname. Please use your email and password to login.</p>";
    //     include '../view/login.php';
    //     exit;
    //   } else {
    //     $message = "<p>Sorry $clientfirstname, but the registration failed. Please try again.</p>";
    //     include '../view/registration.php';
    //     exit;
    //   }
    break;

  default:

    include '../view/login.php';
}
