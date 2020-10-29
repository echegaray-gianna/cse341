<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; ?>

<main>

    <h1> Login </h1>

    <?php

    if (isset($message)) {
        echo $message;
    }
    ?>

    <form action="/projectone/process/process-login.php" method="POST" name="account_login" class="form login">

        <div class="form-login-container">

            <label>
                <span class="login-email">Email</span>
                <input type="email" name="clientemail" class="input-login-email" placeholder="Enter Email" <?php if (isset($clientemail)) {
                                                                                                                echo "value='$clientemail'";
                                                                                                            } ?> required>
            </label>

            <br>

            <label>
                <span class="login-pwd">Password </span>
                <input type="password" name="clientpassword" class="input-login-pwd" placeholder="Enter Password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
            </label>

            <br>

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