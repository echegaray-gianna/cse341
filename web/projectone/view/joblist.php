<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; ?>

<main>

    <h1> Job Post </h1>

    <?php
    $dbUrl = getenv('DATABASE_URL');

    if (empty($dbUrl)) {
        // example localhost configuration URL with postgres username and a database called cs313db
        $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
    }

    $dbopts = parse_url($dbUrl);

    print "<p>$dbUrl</p>\n\n";

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"], '/');

    print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

    try {
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    } catch (PDOException $ex) {
        print "<p>error: $ex->getMessage() </p>\n\n";
        die();
    }

    $statement = $db->query('SELECT jobName, jobLocation FROM job');
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