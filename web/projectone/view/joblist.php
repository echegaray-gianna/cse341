<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>

    <h1> Job Post </h1>

    <?php

        include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';

        $catList = '<select name= "categoryid" id= "categoryid" class="categoryid">';
        $catList .= "<option> Choose a Category </option>";

        foreach ($db->query('SELECT * FROM category') as $category) {

            $catList .= "<option value= '$category[categoryid]'> $category[categoryname]";
            $catList .= "</option>";
        }
        
        $catList .= '</select>';

    ?>



<div for="categoryId">
        <p>Category</p>
        <?php echo $catList; ?>
    </div>
<a href="categoryjob.php?id=<?php $category['categoryid'] ?>"> Search </a>







</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>