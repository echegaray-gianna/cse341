<?php
require_once "../connections/dbconnect.php";

$page_title = 'Login';

switch ($action) {

  case 'logout_user':
    session_destroy();
    header('location: /acme/index.php');
    exit;
    
  break;

  default:

    include '../view/login.php';
}
