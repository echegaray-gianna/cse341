<?php 

require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";
session_start();

 $db = getdb();


 try {

        $jobname = htmlspecialchars ($_POST['jobname']);
        $jobcompany = htmlspecialchars ($_POST['jobcompany']);
        $joblocation = htmlspecialchars ($_POST['joblocation']);
        $jobsalary = htmlspecialchars ($_POST['jobsalary']);
        $jobrequirements = htmlspecialchars ($_POST['jobrequirements']);
        $jobresponsibilities = htmlspecialchars ($_POST['jobresponsibilities']);
        $jobdescription = htmlspecialchars ($_POST['jobdescription']);
        $categoryid = htmlspecialchars ($_POST['categoryid']);
        $clientid = htmlspecialchars ($_POST['clientid']);



        // Check for missing data

        if ($categoryid === 'Choose a Category' ){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/postjob.php';
            exit;
        }

        if (empty($jobname) || empty($jobcompany) || empty($joblocation) || empty($jobsalary) ||
            empty($jobrequirements) || empty($jobresponsibilities) || empty($jobdescription)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/postjob.php';
            exit;
        }

        //Insert info

        $sql = 'INSERT INTO job (jobname, jobcompany, joblocation, jobsalary, jobrequirements, jobresponsibilities, 
                                 jobdescription, categoryid, clientid)
                VALUES (:jobname, :jobcompany, :joblocation, :jobsalary, :jobrequirements, :jobresponsibilities,
                        :jobdescription, :categoryid, :clientid)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':jobname', $jobname);
        $stmt->bindValue(':jobcompany', $jobcompany);
        $stmt->bindValue(':joblocation', $joblocation);
        $stmt->bindValue(':jobsalary', $jobsalary);
        $stmt->bindValue(':jobrequirements', $jobrequirements);
        $stmt->bindValue(':jobresponsibilities', $jobresponsibilities);
        $stmt->bindValue(':jobdescription', $jobdescription);
        $stmt->bindValue(':categoryid', $categoryid);
        $stmt->bindValue(':clientid', $clientid);

        $stmt->execute();

        setcookie('jobposition', $jobname, strtotime('+1 year'), '/');
        $message = "<p>Thanks for post. $jobname was post in our list.</p>";
        include '../account-index/index.php';
        exit;
 

    }catch (Exception $ex)
    {
        // Please be aware that you don't want to output the Exception message in
        // a production environment
        echo "Error with DB. Details: $ex";
        die();
    }

header ('location: /projectone/account-index/index.php');
