<?php


session_start();

$page_title = 'Login';

switch ($action) {

  default:

    $clientfirstname = $_SESSION['clientdata']['clientfirstname'];
    $clientlastname = $_SESSION['clientdata']['clientlastname'];
    $clientemail = $_SESSION['clientdata']['clientemail'];
    $clienttype = $_SESSION['clientdata']['clienttype'];

    include '../view/admin.php';
}
