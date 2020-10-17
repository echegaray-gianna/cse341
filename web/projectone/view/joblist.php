<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>

    <h1> Job Post </h1>

    <?php

    include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';
    // $sql = 'SELECT * FROM category';
    // $stmt = $db->prepare($sql);
    // $stmt->execute();
    // while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {

    //     $catname = $categories['categoryname'];
    //     $catid = $categories['categoryid'];

    //     $catList = '<h4 class= "category-list"> Category:';
    //     $catList .= $catname;
    //     $catList .= '<a href="categoryjob.php?id=$catid"> Select </a>';
    // }


    foreach ($db->query('SELECT * FROM category') as $category) {

        // $catname = $category['categoryname'];
        // $catid = $category['categoryid'];

        // $catList = '<h4 class= "category-list"> Category:';
        // $catList .= $catname;
        // $catList .= '<a href="categoryjob.php?id=$catid"> Select </a>';

        echo 'cat name:' . $category['categoryname'];
    }
    

    ?>




    <div for="categoryId">
        <p>Category</p>
        <?php
        //echo $catList;

        ?>

    </div>









</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>