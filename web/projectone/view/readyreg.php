<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; 
 require_once "../connections/dbconnect.php";
 $db = getdb();


 try {

    $clientfirstname = htmlspecialchars ($_POST['clientfirstname']);
    $clientlastname = htmlspecialchars ($_POST['clientlastname']);
    $clientemail = htmlspecialchars ($_POST['clientemail']);
    $clientpassword = htmlspecialchars ($_POST['clientpassword']);
    $clienttype = htmlspecialchars ($_POST['clienttype']);




    $sql = 'INSERT INTO client (clientfirstname, clientlastname, clientemail, clientpassword, clienttype)
        VALUES (:clientfirstname, :clientlastname, :clientemail, :clientpassword, :clienttype)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientfirstname', $clientfirstname);
    $stmt->bindValue(':clientlastname', $clientlastname);
    $stmt->bindValue(':clientemail', $clientemail);
    $stmt->bindValue(':clientpassword', $clientpassword);
    $stmt->bindValue(':clienttype', $clienttype);

    $stmt->execute();

    // $clientid = $db->lastInsertId("clientid_seq");


}catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}


?>


<main>

    <h1 class="title-category"> Job Category </h1>
    <h3 class="subtitle-category"> Please select a category </h3>

    <div for="categoryId">
        <p>client</p>

        <?php

        //connect to DB
         require_once "../connections/dbconnect.php";
        $db= getdb();

        $sql = 'SELECT * FROM client';

        $stmt = $db->prepare($sql);
        $stmt->execute();
    
        while ($client = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
            $catid = $client['clientid'];
            $clyname = $client['clientfirstname'];
            $cltype = $client['clienttype'];
    
    
    
            echo "<p class='title-category-job'> $client[clientid] </p>";
            echo "<p class= 'subtitle-category-job'> $clyname </p>";
            echo "<p class= 'subtitle-category-job'> $cltype </p>";
        }

         //statement
        // $sql = 'SELECT * FROM category';
        // $stmt = $db->prepare($sql);
        // $stmt->execute();
        // while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //     $catname = $categories['categoryname'];
        //     $catid = $categories['categoryid'];

        // echo "<h4 class= 'category-list'> $catname <a href='/projectone/view/categoryjob.php?id=$catid'> Select </a> </h4>";

        // }
        
        ?>

    </div>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html> 