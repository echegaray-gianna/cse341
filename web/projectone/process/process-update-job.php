
  <?php

    require_once "../connections/dbconnect.php";
    require_once "../functions/functions.php";
    session_start();

    $db = getdb();

    try {

        $clientfirstname = $_SESSION['clientdata']['clientfirstname'];
        $clientlastname = $_SESSION['clientdata']['clientlastname'];
        $clientemail = $_SESSION['clientdata']['clientemail'];
        $clienttype = $_SESSION['clientdata']['clienttype'];

        $jobid = htmlspecialchars($_POST['jobid']);
        $jobname = htmlspecialchars($_POST['jobname']);
        $jobcompany = htmlspecialchars($_POST['jobcompany']);
        $joblocation = htmlspecialchars($_POST['joblocation']);
        $jobsalary = htmlspecialchars($_POST['jobsalary']);
        $jobrequirements = htmlspecialchars($_POST['jobrequirements']);
        $jobresponsibilities = htmlspecialchars($_POST['jobresponsibilities']);
        $jobdescription = htmlspecialchars($_POST['jobdescription']);
        $categoryid = htmlspecialchars($_POST['categoryid']);
        $clientid = htmlspecialchars($_POST['clientid']);


        // Check for missing data

        if ($categoryid === 'Choose a Category') {
            $message = '<p class="notice"> Please provide information for all empty form fields.</p>';
            include '../view/update-post.php';
            exit;
        }

        if (
            empty($jobname) || empty($jobcompany) || empty($joblocation) || empty($jobsalary) ||
            empty($jobrequirements) || empty($jobresponsibilities) || empty($jobdescription)
        ) {
            $message = '<p class="notice"> Please provide information for all empty form fields.</p>';
            header("location: ../view/update-post.php?id=$jobid ");
            exit;
        }




        $updatePostResult = updateJobPost(
            $jobid,
            $jobname,
            $jobcompany,
            $joblocation,
            $jobsalary,
            $jobrequirements,
            $jobresponsibilities,
            $jobdescription,
            $categoryid,
            $clientid
        );

        if ($updatePostResult) {
            
            $messageJobChg = '<p class="notice"> Thanks for updating your job post</p>';
            $_SESSION['messageJobChg'] = $messageJobChg;
            header('location: /projectone/account-index/index.php');
            exit;
        } else {
            $messageJobChg = '<p class="notice">Sorry but we coudnt update your job post. Please try again.</p>';
            $_SESSION['messageJobChg'] = $messageJobChg;
            header('location: /projectone/account-index/index.php');
            exit;
        }
    } catch (Exception $ex) {
        // Please be aware that you don't want to output the Exception message in
        // a production environment
        echo "Error with DB. Details: $ex";
        die();
    }
