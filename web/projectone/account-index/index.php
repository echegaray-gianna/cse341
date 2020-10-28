<?php


session_start();

$clientfirstname = $_SESSION['clientdata']['clientfirstname'];
$clientlastname = $_SESSION['clientdata']['clientlastname'];
$clientemail = $_SESSION['clientdata']['clientemail'];
$clienttype = $_SESSION['clientdata']['clienttype'];

$page_title = 'Login';

switch ($action) {

  default:

    include '../view/admin.php';
}
