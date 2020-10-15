<?php
require_once 'connections/jobconnection.php';



$page_title = 'Home';

switch ($action) {

  default:
    
    include 'view/home.php';
}