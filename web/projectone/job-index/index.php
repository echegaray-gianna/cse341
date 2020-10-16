<?php
require_once 'connections/jobconnection.php';

$page_title = 'Job List';

switch ($action) {

  default:
    
    include '../view/joblist.php';
}