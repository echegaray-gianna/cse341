<?php 

require_once "../connections/dbconnect.php";
require_once "../functions/functions.php";

session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; 

?>


<main>
    <?php

    require_once "../connections/dbconnect.php";
    $db = getdb();
    
    $categoryid = $_GET['id'];


    $sql = 'SELECT job.*, category.* 
                FROM job 
                JOIN category
                ON job.categoryid = category.categoryid
                WHERE job.categoryid = :categoryid';


    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryid', $categoryid, PDO::PARAM_INT);
    $stmt->execute();

    while ($jobinfo = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $catid = $jobinfo['categoryid'];
        $categoryname = $jobinfo['categoryname'];
        $jobname = $jobinfo['jobname'];
        $jobcompany = $jobinfo['jobcompany'];
        $joblocation = $jobinfo['joblocation'];
        $jobsalary = $jobinfo['jobsalary'];
        $jobrequirements = $jobinfo['jobrequirements'];
        $jobresponsibilities = $jobinfo['jobresponsibilities'];
        $jobdescription = $jobinfo['jobdescription'];


        echo "<h1 class='title-category-job'> $categoryname</h1>";
        echo "<h4 class= 'subtitle-category-job'> $jobname </h4>";
        echo "<h5 class= 'comp-name'> $jobcompany   </h5>";
        echo "<h6 class= 'comp-location'>  $joblocation  </h6>";
        echo "<p class= 'comp-salary'>  Salary: $jobsalary  </p>";
        echo "<p class= 'comp-requirements-title'>   Requirements: </p>";
        echo "<p class= 'comp-requirements'>   $jobrequirements </p>";
        echo "<p class= 'comp-responsabilities-title'>   Responsibilities:  </p>";
        echo "<p class= 'comp-responsabilities'>   $jobresponsibilities  </p>";
        echo "<p class= 'comp-description-title'>  Description:  </p>";
        echo "<p class= 'comp-description'>  $jobdescription  </p>";

    }

    echo "<p class='no-job'> There are currently no jobs available in this category. </p>";

    
    ?>



</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>