<?php


$page_title = 'Login';

switch ($action) {

  case 'register':

    $page_title = 'Login';
    // Filter and store the data
    $clientfirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
    $clientlastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
    $clientemail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientpassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    $clienttype = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_STRING);

    //Lesson 7 - Server-side Validation -  connect to functions.php 
    $clientEmail = checkEmail($clientemail);
    $checkPassword = checkPassword($clientpassword);


    //Lesson 8 Unique Registration Check
    $existingEmail = checkExistingEmail($clientEmail);

    // Check for existing email address in the table
    if ($existingEmail) {
      $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
      include '../view/login.php';
      exit;
    }


    // Check for missing data
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/registration.php';
      exit;
    }

    //   // Hash the checked password
    //  // $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

     // Send the data to the model
     $regOutcome = regClient($clientfirstname, $clientlastname, $clientemail, $hclientpassword, $clienttype);

      // Check and report the result
      if ($regOutcome === 1) {
        //Lesson 8- Creating a registration Cookie
        setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
        $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
        include '../view/login.php';
        exit;

        $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
        include '../view/login.php';
        exit;
      } else {
        $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
        include '../view/registration.php';
        exit;
      }
    break;

  default:

    include '../view/login.php';
}
