<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; ?>

<main>

    <h1> Login </h1>

    <form action="#" method="POST" name="account_login" class="form_login">

        <div class="form_login_container">
            <label>
                <span>Email</span>
                <input type="email" name="clientEmail" placeholder="Enter Email" <?php if (isset($clientEmail)) {
                                                                                        echo "value='$clientEmail'";
                                                                                    } ?> required>
            </label>

            <label>
                <span>Password</span>
                <span class="password_info"> </span>
                <input type="password" name="clientPassword" placeholder="Enter Password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
            </label>

            <input type="hidden" name="action" value="login_user"> <br>

            <input type="submit" name="submit" class="btn login" value="Login">

        </div>

    </form>


    <div class="create_account">
        <p class="login-not-memeber"> Not a member? </p>
        <div class="btn_registration">
            <a href="/projectone/account-index/index.php?action=registration" title="Create an Account">
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