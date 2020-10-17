<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>

    <h1> Job Category </h1>
    <h3> Please select a category </h3>

    <?php

    include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';
    $sql = 'SELECT * FROM category';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $catname = $categories['categoryname'];
        $catid = $categories['categoryid'];
    }
   

    ?>




    <div for="categoryId">
        <p>Category</p>
        <?php
         echo "<h4 class= 'category-list'> $catname <a href='/projectone/view/categoryjob.php?id=$catid'> Select </a> </h4>";

        ?>

    </div>









</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>