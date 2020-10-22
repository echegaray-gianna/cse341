<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; ?>


<main>
    <?php
    // require_once "../connections/dbconnect.php";
    // $db = getdb();

    // $sql = 'INSERT INTO client (clientfirstname, clientlastname, clientemail, clientpassword, clienttype)
    //     VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword, :clienttype)';
    // $stmt = $db->prepare($sql);
    // $stmt->bindValue(':clientfirstname', $clientfirstname, PDO::PARAM_STR);
    // $stmt->bindValue(':clientlastname', $clientlastname, PDO::PARAM_STR);
    // $stmt->bindValue(':clientemail', $clientemail, PDO::PARAM_STR);
    // $stmt->bindValue(':clientpassword', $clientpassword, PDO::PARAM_STR);
    // $stmt->bindValue(':clienttype', $clienttype, PDO::PARAM_STR);

    // $stmt->execute();

    ?>

    <h1> Registration</h1>

    <form action="/projectone/account-index/index.php" method="POST" name="account_reg" class="form regist">

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

            <?php

            // //connect to DB
            // require_once "../connections/dbconnect.php";
            // $db = getdb();

            // $clType = '<select name="clienttype" id="typelist">';
            // $clType .= "<option>Choose your Account Type </option>";

            // $sql = 'SELECT clienttype FROM client';
            // $stmt = $db->prepare($sql);
            // $stmt->execute();
            // while ($types = $stmt->fetch(PDO::FETCH_ASSOC)) {

            //     $typename = $types['clienttype'];

            //     $clType .= "<option value='$typename'> $typename </option>";;
            // }

            ?>

            <label for="clienttype">
                <span>Account type</span>
                <select name="clienttype" id="typelist">
                    <option>Choose your Account Type </option>
                    <option value='company'> Company </option>
                    <option value='client'> Client </option>
                </select>

            </label>

            <input type="hidden" name="action" value="register">
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