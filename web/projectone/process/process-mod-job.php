<?php

$jobid = $_GET['id'];
$jobDetails = getSpecificJob($jobid);

if ($jobDetails) {
  foreach ($jobDetails as $jobinfo) {
    $jobid = $jobinfo['jobid'];
    $clientid = $jobinfo['clientid'];
  }
}

if ($jobDetails < 1) {
  $message = '<p class="notify"> Sorry, no product information could be found. </p>';
}

include '../view/update-post.php';
