<?php

require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";
session_start();

$db = getdb();

$clientInfo = getAccountInfo($clientid);
$clientInfoAcc= $_SESSION['clientdata'];

if (isset($clientInfoAcc['clientfirstname'])) { 
  $page_title = "Update $clientInfoAcc[clientfirstname]'s Account ";

} elseif (isset($clientfirstname)) { 
  echo $clientfirstname; 
};


// check if the $clientInfo has any data.
if($clientInfo ===TRUE){
  $_SESSION ['$message'] = 'Sorry, account information could not be found.';
}

include '.projectone/view/client-update.php';
exit;