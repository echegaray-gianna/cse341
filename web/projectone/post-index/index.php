<?php

require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";

session_start();

$page_title = 'Post a Job';

switch ($action) {

  default:
    
  include '../view/postjob.php';
}