<?php


$page_title = 'Login';

switch ($action) {

  case 'registration':
    //Add Title
    $page_title = 'Registration';
    header('location:../view/registration.php');
    break;

  default:

    include '../view/login.php';
}
