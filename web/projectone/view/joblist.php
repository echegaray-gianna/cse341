<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>

    <h1> Job Post </h1>

    <?php
     
     include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';
    

    $statement = $db->prepare('SELECT * FROM job');
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

        echo 'Job Name: ' . $row['jobname'] . '<br>';
    }

    $catList = '<select name= "categoryId" id= "categoryId" class="categoryId">';
    $catList .= "<option> Choose a Category </option>";

    foreach ($categories as $category) {
        $catList .= "<option value= '$category[categoryId]'";

        if (isset ($categoryId)) {

            if($category['categoryId' === $categoryId]){
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