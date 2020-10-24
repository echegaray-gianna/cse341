
  <?php

    try {

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
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/postjob.php';
            exit;
        }

        if (
            empty($jobname) || empty($jobcompany) || empty($joblocation) || empty($jobsalary) ||
            empty($jobrequirements) || empty($jobresponsibilities) || empty($jobdescription)
        ) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/postjob.php';
            exit;
        }

       


        $updatePostResult = updateJobPost( $jobid, $jobname, $jobcompany, $joblocation, $jobsalary, $jobrequirements,
        $jobresponsibilities, $jobdescription, $categoryid, $clientid);

        if ($updatePostResult) {
            $messageReviewTwo = '<p class="notice">Thanks for updating your review</p>';
            $_SESSION['messageReviewTwo'] = $messageReviewTwo;
            header('location: /projectone/accounts-index/index.php');
            exit;
        } else {
            $messageReviewTwo = '<p class="notice">Sorry but we coudnt update your review. Please try again.</p>';
            $_SESSION['messageReviewTwo'] = $messageReviewTwo;
            header('location: /projectone/accounts-index/index.php');
            exit;
        }
        
    } catch (Exception $ex) {
        // Please be aware that you don't want to output the Exception message in
        // a production environment
        echo "Error with DB. Details: $ex";
        die();
    }
