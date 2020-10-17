<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>
    <?php

    include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';
    
    $categoryid= $GET['id'];

    $sql = 'SELECT job.*, category.* 
            FROM job 
            JOIN category
            ON job.categoryid = category.categoryid
            WHERE job.categoryid = :categoryid';
            

    $stmt = $db->prepare($sql);
     $stmt->bindValue(':categoryid', $categoryid);
    // $stmt->bindValue(':categoryname', $categoryname);
    // $stmt->bindValue(':jobid', $jobid);
    // $stmt->bindValue(':jobname', $jobname);
    // $stmt->bindValue(':jobcompany', $jobcompany);
    // $stmt->bindValue(':joblocation', $joblocation);
    // $stmt->bindValue(':jobsalary', $jobsalary);
    // $stmt->bindValue(':jorequirements', $jorequirements);
    // $stmt->bindValue(':jobresponsibilities', $jobresponsibilities);
    // $stmt->bindValue(':jobdescription', $jobdescription);

    $stmt->execute();

    while ($jobinfo = $stmt->fetch(PDO::FETCH_ASSOC)) {


        
        $jobname= $jobinfo['jobname'];

        print_r($jobinfo);
        // echo "<h4 class= 'category-list'> $jobinfo[categoryname]</h4>";
    }

    ?>




</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>