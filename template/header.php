<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>My website</title>
</head>
<div class="header">
    <div class="background_logo_layer1">
    </div>
    <div class="header_navigation">
        <ul>
            <li><a href="http://localhost/index.php?page=home">HOME</a></li>
            <li><a href='http://localhost/index.php?page=products'>PRODUCTS</a></li>
            <li></li>
            <li></li>
            <?php
            if (isset($_SESSION['username'])) {
                echo "<li><a href='http://localhost/index.php?page=logout'>Logout</a></li>";
                echo "<li> Username: " . $_SESSION['username'] . "</li>";
                echo "<li> Userlevel: " . $_SESSION['userlevel'] . "</li>";
            } else {
                echo "<li><a href='http://localhost/index.php?page=login'>LOGIN</a></li>";
                echo "<li><a style='pointer-events: none' href='http://localhost/index.php?page=register'>REGISTER</a></li>";
            }
            ?>

        </ul>
    </div>
    <div class="background_logo_layer3">
        <img class="logo" src="assets/img/logo_darkcolor.png" alt="My Logo">
    </div>

</div>