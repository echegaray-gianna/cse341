<?php
include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php';

?>

<main>

    <h1> Login </h1>

    <?php

    if (isset($message)) {
        echo $message;
    }
    ?>

    <form action="/projectone/process/process-registration.php"" method="POST" name="account_login" class="form login">

        <div class="form_login_container">
            <label>
                <span>Email</span>
                <input type="email" name="clientemail" placeholder="Enter Email" <?php if (isset($clientemail)) {
                                                                                        echo "value='$clientemail'";
                                                                                    } ?> required>
            </label>

            <label>
                <span>Password</span>
                <span class="password_info"> </span>
                <input type="password" name="clientpassword" placeholder="Enter Password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
            </label>

            <input type="submit" name="submit" class="btn login" value="Login">

        </div>

    </form>


    <div class="create_account">
        <p class="login-not-memeber"> Not a member? </p>
        <div class="btn_registration">
            <a href="/projectone/view/registration.php" title="Create an Account">
                Create an Account
            </a>
        </div>
    </div>


</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>