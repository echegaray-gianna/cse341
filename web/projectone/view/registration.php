<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; ?>


<main>

    <h1> Registration</h1>

    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>

    <form action="/projectone/process/process-registration.php" method="POST" name="account_reg" class="form regist">

        <fieldset class="form_registration_container">
            <label>
                <span>Name</span>
                <input type="text" name="clientfirstname" placeholder="Name" required>
            </label>

            <label>
                <span>Last Name</span>
                <input type="text" name="clientlastname" placeholder="Last Name" required>
            </label>

            <label>
                <span>Email</span>
                <input type="email" name="clientemail" placeholder="Email" required>
            </label>

            <label>
                <span>Password</span>
                <span class="password_info"> (Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character)</span>
                <input type="password" name="clientpassword" placeholder="Password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
            </label>

            <label for="clienttype">
                <span>Account type</span>
                <select name="clienttype" id="typelist">
                    <option>Choose your Account Type </option>
                    <option value='company'> Company </option>
                    <option value='client'> Client </option>
                </select>

            </label>

            <input type="submit" name="submit" class="regbtn" value="Register">


        </fieldset>

    </form>




</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>