<?php


$page_title = 'Login';

switch ($action) {
  case 'registration':
    //Add Title
    $page_title = 'registration';
    include '../view/registration.php';
    break;

  default:

    include '../view/login.php';
}
