<?php
require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";

session_start();

$page_title = 'Login';

switch ($action) {

  default:

    $postclientdetails=  getJobPostByClient($_SESSION['clientdata']['jobid']);
    $jobClientDisplay = buildJobPost($postclientdetails);

    include '../view/admin.php';
}
