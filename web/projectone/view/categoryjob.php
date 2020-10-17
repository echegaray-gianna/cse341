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
            WHERE categoryid= :categoryid
            ORDER BY jobname DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();



    while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $catname = $categories['categoryname'];
        $catid = $categories['categoryid'];
        $jobname= $categories['jobname'];

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