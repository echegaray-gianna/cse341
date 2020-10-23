<?php

session_destroy();

unset($_SESSION['clientdata']);
unset($_SESSION['loggedin']);

header('location: /projectone/view/login.php');
die();