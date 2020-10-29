 <?php
    require_once "../connections/dbconnect.php";
    require_once "../functions/functions.php";
    
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; 
    
  ?>


<main>

    <h1 class="title-category"> Job Category </h1>
    <h3 class="subtitle-category"> Please select a category </h3>

    <div class="categoryId">
        <?php

        //connect to DB
         require_once "../connections/dbconnect.php";
        $db= getdb();

        //statement
        $sql = 'SELECT * FROM category';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $catname = $categories['categoryname'];
            $catid = $categories['categoryid'];

        echo "<p class= 'category-list'> $catname <a href='/projectone/view/categoryjob.php?id=$catid'> Select </a> </p>";

        }
        
        ?>

    </div>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html> 