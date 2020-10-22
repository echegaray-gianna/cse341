<?php


$page_title = 'Login';

switch ($action) {

  case 'register':

    $page_title = 'Login';

    $clientfirstname = htmlspecialchars ($_POST['clientfirstname']);
    $clientlastname = htmlspecialchars ($_POST['clientfirstname']);
    $clientemail = htmlspecialchars ($_POST['clientfirstname']);
    $clientpassword = htmlspecialchars ($_POST['clientfirstname']);
    $clienttype = htmlspecialchars ($_POST['clientfirstname']);

    require_once "../connections/dbconnect.php";
    $db = getdb();

    $sql = 'INSERT INTO client (clientfirstname, clientlastname, clientemail, clientpassword, clienttype)
        VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword, :clienttype)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientfirstname', $clientfirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientlastname', $clientlastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientemail', $clientemail, PDO::PARAM_STR);
    $stmt->bindValue(':clientpassword', $clientpassword, PDO::PARAM_STR);
    $stmt->bindValue(':clienttype', $clienttype, PDO::PARAM_STR);

    $stmt->execute();

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
