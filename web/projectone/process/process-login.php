<?php

 require_once "../connections/dbconnect.php";
 require_once "../functions/functions.php";


 $db = getdb();

 try {

    $clientemail = htmlspecialchars ($_POST['clientemail']);
    $clientpassword = htmlspecialchars ($_POST['clientpassword']);

    $clientemail = checkEmail($clientemail);
    $checkPassword = checkPassword($clientpassword);

   


    // Check for missing data

    if (empty($clientemail) || empty($checkPassword)) {
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/registration.php';
        exit;
    }


    $sql = 'SELECT *
            FROM client
            WHERE clientemail = :clientemail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientemail', $clientemail);

    $result = $statement->execute();

    if ($result){

        $clientdata = $stmt->fetch();


    $hashCheck = password_verify($clientPassword, $clientdata['clientpassword']);
    }

    if (!$hashCheck) {
        $message = '<p class="notice">Please check your password and try again.</p>';
        include '../view/login.php';
        exit;
    }

    // // A valid user exists, log them in
    // $_SESSION['loggedin'] = TRUE;
    // setcookie('firstname', '', time() - 3600, '/');
    // // Remove the password from the array

    // array_pop($clientdata);
    // // Store the array into the session
    // $_SESSION['clientData'] = $clientData;

    // // Send them to the admin view
    include '../view/admin.php';
    exit;




}catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

header ('location: /projectone/view/login./php');
