<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>


<main>

    <?php
    if ($_SESSION['loggedin'] = FALSE) {
        header('location: /projectone/index.php');
        exit;
    }

    $clientfirstname = $_SESSION['clientdata']['clientfirstname'];
    $clientlastname = $_SESSION['clientdata']['clientlastname'];
    $clientemail = $_SESSION['clientdata']['clientemail'];
    $clienttype = $_SESSION['clientdata']['clienttype'];


    echo "<h1> $clientfirstname $clientlastname </h1>
          <h2 class= 'logged_text'> You are logged in. </h2>";

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
    }

    if (isset($message)) {
        echo $message;
    }

    echo "<ul class='admin_client_info'>
                <li> First Name: $clientfirstname </li>
                <li> Last Name: $clientlastname </li>
                <li> Email Address: $clientemail </li>
          </ul>
          <h2 class= 'adm_text'> Use the link below to manage your account. </h2>
          <div class= 'admnAccLink'>
                <a href= '/projectone/view/client-update.php' title= 'Update Account Information'> Update Account Information </a>
          </div>";


    if (isset($_SESSION['messageReviewTwo'])) {
        echo $_SESSION['messageReviewTwo'];
        unset($_SESSION['messageReviewTwo']);
    }

    if ($clienttype === 'company') {
        echo "<div class= 'post-job-add-container'>
                    <h2 class = 'post-job-add'>Use the link below to manage your post  </h2>
                    <div class= 'post-job-add-link'>
                        <a href='/projectone/post-index/index.php' title= 'jobs'> List a New Post </a> 
                    </div> 
              </div>";

        if (isset($jobClientDisplay)) {
            echo $jobClientDisplay;
        }
    }

    ?>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>