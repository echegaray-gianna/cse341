<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>

    <h1> Job Post </h1>

    <?php
     
     include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';
    

    $sql = 'SELECT * FROM job';
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $categories = $stmt->fetchAll();
    $stmt ->closeCuror();

    return $categories;

        echo 'Job Name: ' . $categories['jobname'] . '<br>';
    

    $catList = '<select name= "categoryId" id= "categoryId" class="categoryId">';
    $catList .= "<option> Choose a Category </option>";

    foreach ($categories as $category) {
        $catList .= "<option value= '$category[categoryid]'";

        if (isset ($categoryId)) {

            if($category['categoryid' === $categoryId]){
            $catList .= 'selected';
            }
        }

        $catList .= ">$category[categoryname] </option>";
    }
    $catList .= '</select>';

    

    ?>


<div for="categoryId">
            <p>Category</p>
            <?php echo $catList; ?>
</div>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>