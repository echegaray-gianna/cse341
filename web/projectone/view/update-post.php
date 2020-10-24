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

    <form action="/projectone/process/process-update-job.php" method="POST" name="jobupdate" class="form jobupdate">

        <fieldset class="form_postjob_container">

            <label for="jobname">
                <span>Position Name</span>
                <input type="text" name="jobname" id="jobname" placeholder="Enter Position Name" <?php if (isset($jobname)) {
                                                                                                        echo "value='$jobname'";
                                                                                                    } elseif (isset($jobinfo['jobname'])) {
                                                                                                        echo "value= '$jobinfo[jobname]'";
                                                                                                    }  ?> required>
            </label>

            <label for="jobcompany">
                <span>Company Name</span>
                <input type="text" name="jobcompany" id="jobcompany" placeholder="Enter Company Name" <?php if (isset($jobcompany)) {
                                                                                                            echo "value='$jobcompany'";
                                                                                                        } elseif (isset($jobinfo['jobcompany'])) {
                                                                                                            echo "value= '$jobinfo[jobcompany]'";
                                                                                                        }  ?> required>
            </label>

            <label for="joblocation">
                <span>Job Location</span>
                <input type="text" name="joblocation" id="joblocation" placeholder="Enter Job Location" <?php if (isset($joblocation)) {
                                                                                                            echo "value='$joblocation'";
                                                                                                        } elseif (isset($jobinfo['joblocation'])) {
                                                                                                            echo "value= '$jobinfo[joblocation]'";
                                                                                                        }  ?> required>
            </label>

            <label for="jobsalary">
                <span>Job Salary</span>
                <input type="text" name="jobsalary" id="jobsalary" placeholder="Enter Job Salary" <?php if (isset($jobsalary)) {
                                                                                                        echo "value='$jobsalary'";
                                                                                                    } elseif (isset($jobinfo['jobsalary'])) {
                                                                                                        echo "value= '$jobinfo[jobsalary]'";
                                                                                                    }  ?> required>
            </label>

            <label for="jobrequirements">
                <span>Job Requirements</span>
                <input type="text" name="jobrequirements" id="jobrequirements" placeholder="Enter Job Requirements" <?php if (isset($jobrequirements)) {
                                                                                                                        echo "value='$jobrequirements'";
                                                                                                                    } elseif (isset($jobinfo['jobrequirements'])) {
                                                                                                                        echo "value= '$jobinfo[jobrequirements]'";
                                                                                                                    }  ?> required>
            </label>

            <label for="jobresponsibilities">
                <span>Job Responsibilities</span>
                <input type="text" name="jobresponsibilities" id="jobresponsibilities" placeholder="Enter Job Responsibilities" <?php if (isset($jobresponsibilities)) {
                                                                                                                                    echo "value='$jobresponsibilities'";
                                                                                                                                } elseif (isset($jobinfo['jobresponsibilities'])) {
                                                                                                                                    echo "value= '$jobinfo[jobresponsibilities]'";
                                                                                                                                }  ?> required>
            </label>

            <label for="jobdescription">
                <span>Job Description</span>
                <input type="text" name="jobdescription" id="jobdescription" placeholder="Enter Job Description" <?php if (isset($jobdescription)) {
                                                                                                                        echo "value='$jobdescription'";
                                                                                                                    } elseif (isset($jobinfo['jobdescription'])) {
                                                                                                                        echo "value= '$jobinfo[jobdescription]'";
                                                                                                                    }  ?> required>
            </label>


            <?php

            //connect to DB
            $db = getdb();

            $catList = '<select name="categoryid" id="categorylist">';
            $catList .= "<option>Choose a Category</option>";

            $sql = 'SELECT * FROM category';
            $stmt = $db->prepare($sql);
            $stmt->execute();
            while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $catname = $categories['categoryname'];
                $catid = $categories['categoryid'];


                if (isset($categoryid)) {

                    if ($categories['categoryid' === $categoryid]) {
                        $catList .= 'selected';
                    }
                } elseif (isset($jobinfo['categoryid'])) {
                    if ($categories['categoryid'] === $jobinfo['categoryid']) {
                        $catList .= ' selected ';
                    }
                }

                $catList .= "<option value='$catid'>$catname</option>";


            }

            ?>

            <label for="categoryid">
                <span>Category</span>
                <?php echo $catList; ?>
            </label>


            <input type="hidden" name="clientid" value="<?php if (isset($clientInfoAcc)) {
                                                            echo $clientInfoAcc['clientid'];
                                                        } elseif (isset($clientid)) {
                                                            echo $clientid;
                                                        } ?>">


            <input type='submit' name='submit' id='btn jobpost' value='Add Job'>


        </fieldset>

    </form>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>