<?php
require_once 'connections/jobconnection.php';

session_start();

$page_title = 'Home';

switch ($action) {

  default:
    
    include 'view/home.php';
}