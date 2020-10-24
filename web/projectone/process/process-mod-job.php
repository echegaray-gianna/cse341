<?php

$reviewId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$reviewJobDetails = getSpecificJob($jobid);

if ($reviewJobDetails) {
  foreach ($reviewJobDetails as $jobinfo) {
    $jobid = $jobinfo['jobid'];
    $clientid = $jobinfo['clientid'];
  }
}

if ($reviewJobDetails < 1) {
  $message = '<p class="notice"> Sorry, no product information could be found. </p>';
}

include '../view/update-post.php';
