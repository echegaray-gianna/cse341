<?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/head.php'; ?>


<main>
    <?php

    include $_SERVER['DOCUMENT_ROOT'] . '/projectone/connections/jobconnection.php';

    ?>

<h1> Registration</h1>

<form action="" method="POST" name="account_reg" class="form regist">

<fieldset class="form_registration_container">
    <label>
        <span>Name</span>
        <input type="text" name="clientfirstname" placeholder="Name" <?php if(isset($clientfirstname)){echo "value='$clientfirstname'";}  ?> required>            
    </label>

    <label>
        <span>Last Name</span>
        <input type="text" name="clientlastname" placeholder="Last Name" <?php if(isset($clientlastname)){echo "value='$clientlastname'";}  ?> required>
    </label>

    <label>
        <span>Email</span>
        <input type="email" name="clientemail" placeholder="Email" <?php if(isset($clientemail)){echo "value='$clientemail'";}  ?> required>
    </label>

    <label>
        <span>Password</span>
        <span class="password_info"> (Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character)</span>
        <input type="password" name="clientpassword"  placeholder="Password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
    </label>


    <input type="submit" name="submit" class="regbtn" value="Register">

    <input type="hidden" name="action" value="register"> 

</fieldset>

</form>




</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/projectone/modules/footer.php'; ?>
</footer>

<script src="/projectone/script/script.js"></script>

</body>

</html>