<?php 

 require_once "../connections/dbconnect.php";
 require_once "../functions/functions.php";


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
        $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
        include '../view/login.php';
        exit;
    }

    // Check for missing data
    if (empty($clientfirstname) || empty($clientlastname) || empty($clientemail) || empty($checkpassword) || empty($clienttype)) {
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/registration.php';
        exit;
    }


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

    if ($regOutcome === 1) {
        //Lesson 8- Creating a registration Cookie
        setcookie('firstname', $clientfirstname, strtotime('+1 year'), '/');
        $message = "<p>Thanks for registering $clientfirstname. Please use your email and password to login.</p>";
        include '../view/login.php';
        exit;
        
      } else {
        $message = "<p>Sorry $clientfirstname, but the registration failed. Please try again.</p>";
        include '../view/registration.php';
        exit;
      }



}catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

header ('location: /projectone/view/login./php');

?>
