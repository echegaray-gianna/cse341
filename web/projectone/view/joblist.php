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

    //     $catList = '<select name= "categoryid" id= "categoryid" class="categoryid">';
    //     $catList .= "<option> Choose a Category </option>";

    //     foreach ($categories as $category) {
    //         $catList .= "<option value= '$category[categoryid]'";

    //         if (isset($categoryid)) {

    //             if ($category['categoryid' === $categoryid]) {
    //                 $catList .= 'selected';
    //             }
    //         }

    //         $catList .= ">$category[categoryname] </option>";

    //     }
    // }
    // $catList .= '</select>';

    $catList = '<select name= "categoryid" id= "categoryid" class="categoryid">';
    $catList .= "<option> Choose a Category </option>";

    foreach ($db->query('SELECT * FROM category') as $category) {

        $catList .= "<option value= '$category[categoryid]'> $category[categoryname]";
        $catList .= "</option>";
    }
    
    $catList .= '</select>';

    echo $catList;
    ?>


<!-- <label for="categoryid">
            <span>Category</span>
            
</label> -->


<select>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>