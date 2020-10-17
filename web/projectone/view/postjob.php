<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; ?>

<main>

    <h1> Post a Job </h1>

    <form action="#" method="POST" name="account_login" class="form_login">

        <fieldset class="form_postjob_container">

            <label for="jobname">
                <span>Position Name</span>
                <input type="text" name="jobname" id="jobname" placeholder="Enter Position Name" <?php if (isset($jobname)) {
                                                                                                        echo "value='$jobname'";
                                                                                                    }  ?> required>
            </label>

            <label for="jobcompany">
                <span>Company Name</span>
                <input type="text" name="jobcompany" id="jobcompany" placeholder="Enter Company Name" <?php if (isset($jobcompany)) {
                                                                                                            echo "value='$jobcompany'";
                                                                                                        }  ?> required>
            </label>

            <label for="joblocation">
                <span>Job Location</span>
                <input type="text" name="joblocation" id="joblocation" placeholder="Enter Job Location" <?php if (isset($joblocation)) {
                                                                                                                echo "value='$joblocation'";
                                                                                                            }  ?> required>
            </label>

            <label for="jobsalary">
                <span>Job Salary</span>
                <input type="text" name="jobsalary" id="jobsalary" placeholder="Enter Job Salary" <?php if (isset($jobsalary)) {
                                                                                                            echo "value='$jobsalary'";
                                                                                                        }  ?> required>
            </label>

            <label for="jobrequirements">
                <span>Job Requirements</span>
                <input type="text" name="jobrequirements" id="jobrequirements" placeholder="Enter Job Requirements" <?php if (isset($jobrequirements)) {
                                                                                                                        echo "value='$jobrequirements'";
                                                                                                                    }  ?> required>
            </label>

            <label for="jobresponsibilities">
                <span>Job Responsibilities</span>
                <input type="text" name="jobresponsibilities" id="jobresponsibilities" placeholder="Enter Job Responsibilities" <?php if (isset($jobresponsibilities)) {
                                                                                                                                echo "value='$jobresponsibilities'";
                                                                                                                            }  ?> required>
            </label>

            <label for="jobdescription">
                <span>Job Description</span>
                <input type="text" name="jobdescription" id="jobdescription" placeholder="Enter Job Description" <?php if (isset($jobdescription)) {
                                                                                                                    echo "value='$jobdescription'";
                                                                                                                }  ?> required>
            </label>


            <?php

            include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';

            $catList = '<select name="categoryid" id="categorylist">';
            $catList .= "<option>Choose a Category</option>";

            $sql = 'SELECT category * FROM category';

            foreach ($db->query($sql) as $getcategory) {

                echo $getcategory['categoryname'];

                $catList .= "<option value='$getcategory[categoryid]'>$getcategory[categoryname]</option>";
            }

            $catList .= '</select>';

            echo $catList;

            ?>

            <label for="categoryid">
                <span>Category</span>
                <?php echo $catList; ?>
            </label>

            <input type='hidden' name='clientid' value='<?php if (isset($clientid)) {
                                                            echo $clientid;
                                                        } ?>'>

            <input type='hidden' name='action' value='add_job'>
            <input type='submit' name='submit' id='btn jobpost' value='Add Job'>


        </fieldset>

    </form>


    <div class="create_account">
        <p class="login-not-memeber"> Not a member? </p>
        <div class="btn_registration">
            <a href="#" title="Create an Account">
                Create an Account
            </a>
        </div>
    </div>


</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>