<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; ?>

<main>

    <h1> Job Post </h1>

    <?php

    $db = get_db();
    $statement = $db->query('SELECT jobName, jobLocation FROM job');
    $statement ->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

        echo 'job: ' . $row['jobName'] . ' location: ' . $row['jobLocation'] . '<br/>';
    }
    
    ?>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>