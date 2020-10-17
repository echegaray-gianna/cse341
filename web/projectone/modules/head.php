<!DOCTYPE html>
<html lang="en-us">

<head>
    <title><?php if (isset($page_title)) {
                echo $page_title;
            } ?> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>

    <link href="/projectone/css/style.css" type="text/css" rel="stylesheet">

</head>

<body>

    <header>

        <div class="container-logo">
            <a href="index.php">
                <div class="logo">
                    <h1 class="title-header">Silicone Slopes</h1>
                    <p class="text-header">Tech Jobs</p>
                </div>
            </a>
        </div>


        <nav class="nav-container">
            <ul class="nav-info">

                <li><a class="nav-link" href="/projectone/index.php">Home</a> </li>
                <li><a class="nav-link" href="/projectone/job-index/index.php">Jobs </a></li>
                <li><a class="nav-link" href="/projectone/post-index/index.php">Post a Job </a></li>
                <li class="login'"><a class="active" href="#about">About</a></li>

            </ul>
        </nav>


    </header>