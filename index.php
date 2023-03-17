<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>My website</title>
</head>

<body>
    <header class="header">
        <img src="/img/hcmut-logo.png" alt="My Logo">
        <h1>BK-Selling</h1>
        <nav>
            <ul>
                <li><a href="http://localhost/index.php?page=home">Home</a></li>
                <li><a href="http://localhost/index.php?page=products">Products</a></li>
                <li><a href="http://localhost/index.php?page=login">Login</a></li>
                <!-- //!disable the <a/> -->
                <li><a style="pointer-events: none" 
                href="http://localhost/index.php?page=register">Register</a></li>
            </ul>
        </nav>
    </header>

    <?php
    if (isset($_GET['page']) && $_GET['page'] == 'products') {
        // header("Location: http://localhost/products.php");
        include 'products.php';
    }
    elseif (isset($_GET['page']) && $_GET['page'] == 'home') {
        // header("Location: http://localhost/home.php");
        include 'home.php';
    }
    elseif (isset($_GET['page']) && $_GET['page'] == 'login') {
        // header("Location: http://localhost/login.php");
        include 'login.php';
    }
    elseif (isset($_GET['page']) && $_GET['page'] == 'register') {
        // header("Location: http://localhost/register.php");
        include 'register.php';
    }
    else{
        include 'home.php';
    }
    ?>

<div class="footer">
        <div class="contact footer__section">
            <span>Liên hệ</span>
            <ul class="contact-list">
                <li class="contact-item">
                    <i class="ti-location-pin"></i>Địa chỉ: 268 Lý
                    Thường Kiệt, P.14, Q.10, TP.HCM
                </li>
                <li class="contact-item">
                    <i class="ti-email"></i>Email:
                    <a href="mailto: phong.tranwindyfeng@hcmut.edu.vn">phong.tranwindyfeng@hcmut.edu.vn
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer__section">
            <span>
                Powered by <i>Ky Phong <br /> </i>
                <span>
                    Ho Chi Minh
                    University of Technology
                    <img id="logo" src="/img/hcmut-logo.png" alt="" />
                </span>
            </span>
        </div>
    </div>
    </div>
</body>

</html>

