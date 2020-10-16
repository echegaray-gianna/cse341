<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>

    <h1> Job Post </h1>

    <?php
     
     include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';
    

    $statement = $db->prepare('SELECT * FROM job');
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

        echo 'Job Name: ' . $row['jobname'];
    }

    ?>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>