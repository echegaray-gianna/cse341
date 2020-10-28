
  <?php

require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";
session_start();

$db = getdb();

try {

    $jobid = htmlspecialchars($_POST['jobid']);
    $jobname = htmlspecialchars($_POST['jobname']);
    $jobcompany = htmlspecialchars($_POST['jobcompany']);
    $joblocation = htmlspecialchars($_POST['joblocation']);
    $clientid = htmlspecialchars($_POST['clientid']);

    $deletePostResult =  deletJob($jobid);

    if ($deletePostResult) {
        $messageJobTwo = '<p class="notice">Your Job post  was deleted</p>';
        $_SESSION['messageJobTwo'] = $messageJobTwo;
        header('location: /projectone/account-index/index.php');
        exit;
    } else {
        $messageJobTwo = '<p class="notice">Sorry but we coudnt delete your job post. Please try again.</p>';
        $_SESSION['messageJobTwo'] = $messageJobTwo;
        header('location: /projectone/account-index/index.php');
        exit;
    }
} catch (Exception $ex) {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}
