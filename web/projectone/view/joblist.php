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

<form action="/projectone/job-index/index.php" method="POST" name="view-jobs" class = "choose-category">

<lable for="categoryId">
        <span>Category</span>
        <?php echo $catList; ?>
</lable>
<input type="hidden" name= "action" value="JobListByCat">
<input type="submit" name= "submit" class="sub-btn" value="Search">

</form>





</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>