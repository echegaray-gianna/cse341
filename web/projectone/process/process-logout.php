<?php

session_destroy();

unset($_SESSION['clientdata']);

header('location: /projectone/view/login.php');
die();