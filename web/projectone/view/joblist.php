<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>

    <h1> Job Post </h1>

    <?php

    include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';
    $sql = 'SELECT * FROM category';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $catname = $categories['categoryname'];
        $catid = $categories['categoryid'];

       $catList= "<h4 class= 'category-list'> $catname <a href='/projectone/view/categoryjob.php?id=$catid'> Select </a> </h4>";

    }
   

    ?>




    <div for="categoryId">
        <p>Category</p>
        <?php
        echo $catList;

        ?>

    </div>









</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>