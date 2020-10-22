 <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; ?>


<main>

    <h1 class="title-category"> Job Category </h1>
    <h3 class="subtitle-category"> Please select a category </h3>

    <div for="categoryId">
        <p>Category</p>

        <?php

        //connect to DB
         require_once "../connections/dbconnect.php";
        $db= getdb();

        $sql = 'SELECT * FROM client';

        $stmt = $db->prepare($sql);
        $stmt->execute();
    
        while ($client = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
            $catid = $client['clientid'];
            $clyname = $client['clientfirstname'];
            $cltype = $clientt['clienttype'];
    
    
    
            echo "<p class='title-category-job'> $client[clientid] </p>";
            echo "<p class= 'subtitle-category-job'> $clyname </p>";
            echo "<p class= 'subtitle-category-job'> $cltype </p>";
        }

         //statement
        // $sql = 'SELECT * FROM category';
        // $stmt = $db->prepare($sql);
        // $stmt->execute();
        // while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //     $catname = $categories['categoryname'];
        //     $catid = $categories['categoryid'];

        // echo "<h4 class= 'category-list'> $catname <a href='/projectone/view/categoryjob.php?id=$catid'> Select </a> </h4>";

        // }
        
        ?>

    </div>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html> 