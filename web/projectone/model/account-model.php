<?php

require_once "../connections/dbconnect.php";

// function regClient($clientfirstname, $clientlastname, $clientemail, $clientpassword, $clienttype){

// $db = getdb();
// $sql = 'INSERT INTO client (clientfirstname, clientlastname, clientemail, clientpassword, clienttype)
//         VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword, :clienttype)';
// $stmt = $db->prepare($sql); 
// $stmt->bindValue(':clientfirstname', $clientfirstname, PDO::PARAM_STR);
// $stmt->bindValue(':clientlastname', $clientlastname, PDO::PARAM_STR);
// $stmt->bindValue(':clientemail', $clientemail, PDO::PARAM_STR);
// $stmt->bindValue(':clientpassword', $clientpassword, PDO::PARAM_STR);     
// $stmt->bindValue(':clienttype', $clienttype, PDO::PARAM_STR);     

// $stmt->execute();

// $rowsChanged = $stmt->rowCount();
// // Close the database interaction
// $stmt->closeCursor();
// // Return the indication of success (rows changed)
// return $rowsChanged;


// }