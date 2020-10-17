<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>
    <?php

    include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';
    
    $categoryid= $GET['id'];

    $sql = 'SELECT job.*, category.* 
            FROM job 
            INNER JOIN category
            ON job.categoryid = category.categoryid
            WHERE job.categoryid = category.categoryid';
            

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryid', $categoryid, PDO::PARAM_INT);
    $stmt->bindValue(':categoryname', $categoryname, PDO::PARAM_STR);
    $stmt->bindValue(':jobid', $jobid, PDO::PARAM_INT);
    $stmt->bindValue(':jobname', $jobname, PDO::PARAM_STR);
    $stmt->bindValue(':jobcompany', $jobcompany, PDO::PARAM_STR);
    $stmt->bindValue(':joblocation', $joblocation, PDO::PARAM_STR);
    $stmt->bindValue(':jobsalary', $jobsalary, PDO::PARAM_STR);
    $stmt->bindValue(':jorequirements', $jorequirements, PDO::PARAM_STR);
    $stmt->bindValue(':jobresponsibilities', $jobresponsibilities, PDO::PARAM_STR);
    $stmt->bindValue(':jobdescription', $jobdescription, PDO::PARAM_STR);

    $stmt->execute();

    while ($jobinfo = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $jobname= $jobinfo['jobname'];

        echo "<h4 class= 'category-list'> $jobname</h4>";
    }

    ?>




</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>