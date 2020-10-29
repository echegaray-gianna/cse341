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

    ?>

    <h1> Post a Job </h1>

    <?php

    if (isset($message)) {
        echo $message;
    }
    ?>

    <form action="/projectone/process/process-post-job.php" method="POST" name="jobpost" class="form jobpost">

        <fieldset class="form_postjob_container">

            <label for="jobname">
                <span>Position Name</span>
                <input type="text" name="jobname" id="jobname" placeholder="Enter Position Name" <?php if (isset($jobname)) {
                                                                                                        echo "value='$jobname'";
                                                                                                    }  ?> required>
            </label>

            <br>

            <label for="jobcompany">
                <span>Company Name</span>
                <input type="text" name="jobcompany" id="jobcompany" placeholder="Enter Company Name" <?php if (isset($jobcompany)) {
                                                                                                            echo "value='$jobcompany'";
                                                                                                        }  ?> required>
            </label>

            <br>

            <label for="joblocation">
                <span>Job Location</span>
                <input type="text" name="joblocation" id="joblocation" placeholder="Enter Job Location" <?php if (isset($joblocation)) {
                                                                                                            echo "value='$joblocation'";
                                                                                                        }  ?> required>
            </label>

            <br>

            <label for="jobsalary">
                <span>Job Salary</span>
                <input type="text" name="jobsalary" id="jobsalary" placeholder="Enter Job Salary" <?php if (isset($jobsalary)) {
                                                                                                        echo "value='$jobsalary'";
                                                                                                    }  ?> required>
            </label>

            <br>

            <label for="jobrequirements">
                <span>Job Requirements</span>
                <input type="text" name="jobrequirements" id="jobrequirements" placeholder="Enter Job Requirements" <?php if (isset($jobrequirements)) {
                                                                                                                        echo "value='$jobrequirements'";
                                                                                                                    }  ?> required>
            </label>

            <br>

            <label for="jobresponsibilities">
                <span>Job Responsibilities</span>
                <input type="text" name="jobresponsibilities" id="jobresponsibilities" placeholder="Enter Job Responsibilities" <?php if (isset($jobresponsibilities)) {
                                                                                                                                    echo "value='$jobresponsibilities'";
                                                                                                                                }  ?> required>
            </label>

            <br>

            <label for="jobdescription">
                <span>Job Description</span>
                <input type="text" name="jobdescription" id="jobdescription" placeholder="Enter Job Description" <?php if (isset($jobdescription)) {
                                                                                                                        echo "value='$jobdescription'";
                                                                                                                    }  ?> required>
            </label>

            <br>

            <?php

            //connect to DB
            require_once "../connections/dbconnect.php";
            $db = getdb();

            $catList = '<select name="categoryid" id="categorylist" class= "categorylist">';
            $catList .= "<option>Choose a Category</option>";

            $sql = 'SELECT * FROM category';
            $stmt = $db->prepare($sql);
            $stmt->execute();
            while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $catname = $categories['categoryname'];
                $catid = $categories['categoryid'];

                $catList .= "<option value='$catid'>$catname</option>";;
            }

            ?>

            <label for="categoryid">
                <span>Category</span>
                <?php echo $catList; ?>
            </label>

            <br>

            <input type="hidden" name="clientid" value="<?php if (isset($clientInfoAcc)) {
                                                            echo $clientInfoAcc['clientid'];
                                                        } elseif (isset($clientid)) {
                                                            echo $clientid;
                                                        } ?>">


            <input type='submit' name='submit' class='btn jobpost' value='Add Job'>


        </fieldset>

    </form>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>