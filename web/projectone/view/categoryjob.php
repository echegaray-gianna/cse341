<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>
    <?php

        include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';
        
        $categoryid= $_GET['id'];

        
        $sql = 'SELECT job.*, category.* 
                FROM job 
                JOIN category
                ON job.categoryid = category.categoryid
                WHERE job.categoryid = :categoryid';
                

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':categoryid', $categoryid, PDO::PARAM_INT);
        // $stmt->bindValue(':categoryname', $categoryname, PDO::PARAM_STR);
        // $stmt->bindValue(':jobid', $jobid, PDO::PARAM_INT);
        // $stmt->bindValue(':jobname', $jobname, PDO::PARAM_STR);
        // $stmt->bindValue(':jobcompany', $jobcompany, PDO::PARAM_STR);
        // $stmt->bindValue(':joblocation', $joblocation, PDO::PARAM_STR);
        // $stmt->bindValue(':jobsalary', $jobsalary, PDO::PARAM_STR);
        // $stmt->bindValue(':jorequirements', $jorequirements, PDO::PARAM_STR);
        // $stmt->bindValue(':jobresponsibilities', $jobresponsibilities, PDO::PARAM_STR);
        // $stmt->bindValue(':jobdescription', $jobdescription, PDO::PARAM_STR);

        $stmt->execute();

        while ($jobinfo = $stmt->fetch(PDO::FETCH_ASSOC)) {        
            
            $categoryname = $jobinfo['categoryname'];
            $jobname= $jobinfo['jobname'];
            $jobcompany= $jobinfo['jobcompany'];
            $joblocation= $jobinfo['joblocation'];
            $jobsalary= $jobinfo['jobsalary'];
            $jorequirements= $jobinfo['jorequirements'];
            $jobresponsibilities= $jobinfo['jobresponsibilities'];
            $jobdescription= $jobinfo['jobdescription'];


        
            echo "<h4 class= 'category-list'> $jocategorynamebinfo</h4>";
            echo "<h5> $jobname </h5>";













            
        };

        echo "<h4 class= 'category-list'> $jobinfo INGOO</h4>";
        print_r($jobinfo);

        echo "hola 2";

    ?>




</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>