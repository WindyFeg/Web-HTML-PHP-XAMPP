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
<header>
    <img src="/img/hcmut-logo.png" alt="My Logo">
    <h1>BK-Selling</h1>
    <nav>
        <ul>
            <li><a href="http://localhost/index.php?page=home">Home</a></li>
            <li><a href='http://localhost/index.php?page=products'>Products</a></li>
            <?php
            if (isset($_SESSION['username'])) {
                echo "<li><a href='http://localhost/index.php?page=logout'>Logout</a></li>";
                echo "<li> Username: ". $_SESSION['username'] ."</li>";
                echo "<li> Userlevel: ". $_SESSION['userlevel'] ."</li>";
            }
            else{
                echo "<li><a href='http://localhost/index.php?page=login'>Login</a></li>";
                echo "<li><a style='pointer-events: none' href='http://localhost/index.php?page=register'>Register</a></li>";
            }
            ?>
        
        </ul>
    </nav>
</header>

