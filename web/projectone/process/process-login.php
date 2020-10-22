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

        $stmt->execute();

        while ($client =$stmt->fetch(PDO::FETCH_ASSOC)) {

            


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