<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; ?>

<main>

    <h1> Home Page </h1>

    <p class="home-intro"> Welcome to our page. Our purpose is to make the hiring process easier for people and companies.
        Our main focus is the technology market within Silicone Slope. </p>

    <p class="home-intro-two"> If you are looking for a job in technology or need an employee in your company, you are in the right place! </p>

    <?php

    require_once "../connections/dbconnect.php";
    $db = getdb();


    $sql = 'SELECT * 
            FROM client';

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while ($client = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $catid = $client['clientid'];
        $categoryname = $client['clientname'];



        echo "<h1 class='title-category-job'> $catid</h1>";
        echo "<h4 class= 'subtitle-category-job'> $categoryname </h4>";
    }


    ?>



<?php

//connect to DB
require_once "../connections/dbconnect.php";
$db= getdb();

//statement
$sql = 'SELECT * FROM category';
$stmt = $db->prepare($sql);
$stmt->execute();
while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $catname = $categories['categoryname'];
    $catid = $categories['categoryid'];

echo "<h4 class= 'category-list'> $catname <a href='/projectone/view/categoryjob.php?id=$catid'> Select </a> </h4>";

}

?>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>