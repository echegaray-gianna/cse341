<?php


require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";
session_start();

$page_title = 'Login';

switch ($action) {

  default:
  $clientfirstname = $_SESSION['clientdata']['clientfirstname'];
  $clientlastname = $_SESSION['clientdata']['clientlastname'];
  $clientemail = $_SESSION['clientdata']['clientemail'];
  $clienttype = $_SESSION['clientdata']['clienttype'];
  $clientid = $_SESSION['clientdata']['clientid'];


    include '../view/admin.php';
}
