<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>

    <h1> Job Post </h1>

    <?php

    include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';


    function getCategories()
    {
        $db = jobConnect();
        $sql = 'SELECT * FROM category';
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $categories = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCuror();

        return $categories;

    }

    echo 'Category Name: ' . $categories['categoryName'] . '<br>';

   


    $catList = '<select name= "categoryId" id= "categoryId" class="categoryId">';
    $catList .= "<option> Choose a Category </option>";

    foreach ($categories as $category) {
        $catList .= "<option value= '$category[categoryId]'";

        if (isset($categoryId)) {

            if ($category['categoryId' === $categoryId]) {
                $catList .= 'selected';
            }
        }

        $catList .= ">$category[categoryName] </option>";
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