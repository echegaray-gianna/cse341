<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>
    <?php

    include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';
    
    $catid= $GET['id'];

    $sql = 'SELECT job.*, category.* 
            FROM job 
            INNER JOIN category
            WHERE job.categoryid = category.categoryid';
            

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryid', $categoryid, PDO::PARAM_INT);
    $stmt->bindValue(':categoryname', $categoryname, PDO::PARAM_INT);
    $stmt->bindValue(':jobid', $jobid, PDO::PARAM_INT);
    $stmt->bindValue(':jobname', $jobname, PDO::PARAM_INT);
    $stmt->bindValue(':jobCompany', $categoryid, PDO::PARAM_INT);
    $stmt->bindValue(':jobLocation', $categoryid, PDO::PARAM_INT);
    $stmt->bindValue(':jobSalary', $categoryid, PDO::PARAM_INT);
    $stmt->bindValue(':joRequirements', $categoryid, PDO::PARAM_INT);
    $stmt->bindValue(':jobResponsibilities', $categoryid, PDO::PARAM_INT);
    $stmt->bindValue(':jobDescription', $categoryid, PDO::PARAM_INT);
    $stmt->execute();

    while ($jobinfo = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $catname = $jobinfo['categoryname'];
        $catid = $jobinfo['categoryid'];
        $jobname= $jobinfo['jobname'];

        echo "<h4 class= 'category-list'> $catname</h4>";
    }

    ?>




</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>