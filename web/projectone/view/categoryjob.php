<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>
    <?php

    include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';
    
    $catid= $GET['id'];

    $sql = 'SELECT job.*, category.* 
            FROM job 
            INNER JOIN category
            ON job.categoryid = category.categoryid
            WHERE job.categoryid= :categoryid
            ORDER BY jobname DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryid', $categoryid, PDO::PARAM_INT);
    $stmt->execute();

    while ($jobinfo = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $catname = $jobinfo['categoryname'];
        $catid = $jobinfo['categoryid'];
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