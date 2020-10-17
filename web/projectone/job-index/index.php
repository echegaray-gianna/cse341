<?php


$page_title = 'Job List';

switch ($action) {

  case 'JobListByCat':
    //Add Title
    $page_title = 'Category - Jobs';
    header('location:../view/categoryjob.php');

  break;

  default:
    
  include '../view/joblist.php';
}