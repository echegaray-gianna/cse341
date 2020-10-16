<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>

    <h1> Job Post </h1>

    <?php

    include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';


 
        $db = jobConnect();
        $sql = 'SELECT * FROM category';
        $stmt = $db->prepare($sql);
        $stmt->execute();

        while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {

            echo 'Category Name: ' . $categories['categoryname'] . '<br>';

            $catList = '<select name= "categoryid" id= "categoryid" class="categoryid">';
            $catList .= "<option> Choose a Category </option>";
        
            foreach ($categories as $category) {
                $catList .= "<option value= '$category[categoryid]'";
        
                if (isset($categoryId)) {
        
                    if ($category['categoryid' === $categoryid]) {
                        $catList .= 'selected';
                    }
                }
        
                $catList .= ">$category[categoryname] </option>";
        
                echo $category['categoryname'];
            }
            $catList .= '</select>';

        }





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