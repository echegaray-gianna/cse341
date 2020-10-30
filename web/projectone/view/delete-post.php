<?php

require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";

session_start();


include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>

<main>

    <?php
    //Only allow access to the view if client is logged in
    if ($_SESSION['loggedin'] = FALSE) {
        header('location: /projectone/index.php');
        exit;
    }

    $clientInfoAcc = $_SESSION['clientdata'];

    if (isset($clientInfoAcc['clientfirstname'])) {
        $page_title = "Post a Job $clientInfoAcc[clientfirstname] ";
    } else if (isset($clientfirstname)) {
        echo $clientfirstname;
    };

    $jobid = $_GET['id'];
    $jobDetails = getSpecificJob($jobid);

    if ($jobDetails) {
        foreach ($jobDetails as $jobinfo) {
            $jobid = $jobinfo['jobid'];
            $clientid = $jobinfo['clientid'];
        }
    }

    ?>

    <h1> Update your Post Job </h1>

    <?php

    if (isset($message)) {
        echo $message;
    }
    ?>

    <form action="/projectone/process/process-delete-job.php" method="POST" name="jobupdate" class="form jobupdate">

        <fieldset class="form_postjob_container">

            <input type="hidden" name="jobid" value="<?php if (isset($jobid)) {
                                                            echo $jobid;
                                                        } elseif (isset($jobinfo['jobid'])) {
                                                            echo $jobinfo['jobid'];
                                                        }  ?>">

            <label for="jobname">
                <span>Position Name</span>
                <input type="text" name="jobname" id="jobname" placeholder="Enter Position Name" readonly <?php if (isset($jobname)) {
                                                                                                        echo "value='$jobname'";
                                                                                                    } elseif (isset($jobinfo['jobname'])) {
                                                                                                        echo "value= '$jobinfo[jobname]'";
                                                                                                    }  ?> required>
            </label>

            <br>

            <label for="jobcompany">
                <span>Company Name</span>
                <input type="text" name="jobcompany" id="jobcompany" placeholder="Enter Company Name" readonly <?php if (isset($jobcompany)) {
                                                                                                            echo "value='$jobcompany'";
                                                                                                        } elseif (isset($jobinfo['jobcompany'])) {
                                                                                                            echo "value= '$jobinfo[jobcompany]'";
                                                                                                        }  ?> required>
            </label>

            <br>

            <label for="joblocation">
                <span>Job Location</span>
                <input type="text" name="joblocation" id="joblocation" placeholder="Enter Job Location" readonly <?php if (isset($joblocation)) {
                                                                                                            echo "value='$joblocation'";
                                                                                                        } elseif (isset($jobinfo['joblocation'])) {
                                                                                                            echo "value= '$jobinfo[joblocation]'";
                                                                                                        }  ?> required>
            </label>

            <br>

            <input type="hidden" name="clientid" value="<?php if (isset($clientid)) {
                                                            echo $clientid;
                                                        } elseif (isset($jobinfo['clientid'])) {
                                                            echo $jobinfo['clientid'];
                                                        }  ?>">

            <input type='submit' name='submit' class='btn deletepost' value='Delete Job'>


        </fieldset>

    </form>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>