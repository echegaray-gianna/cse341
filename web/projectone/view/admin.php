<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';
session_start();
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
    $clientid = $_SESSION['clientdata']['clientid'];


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
          </ul>";

    echo  "<h2 class= 'adm_text'> Use the link below to manage your account. </h2>
          <div class= 'admnAccLink'>";

    if (isset($_SESSION['messageUpd'])) {
        echo $_SESSION['messageUpd'];
        unset($_SESSION['messageUpd']);
    }

    echo "<a href= '/projectone/view/client-update.php' title= 'Update Account Information'> Update Account Information </a>
          </div>";

    if ($clienttype === 'company') {
        echo "<div class= 'post-job-add-container'>
                    <h2 class = 'post-job-add'>Use the link below to manage your post  </h2>";

        if (isset($_SESSION['messageJobList'])) {
            echo $_SESSION['messageJobList'];
            unset($_SESSION['messageJobList']);
        }

        echo       " <div class= 'post-job-add-link'>
                        <a href='/projectone/post-index/index.php' title= 'jobs'> List a New Post </a> 

                    </div> 
              </div>";


        $postclientdetails =  getJobPostByClient($clientid);
        echo $jobClientDisplay = buildJobPost($postclientdetails);
    };

    ?>

</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>