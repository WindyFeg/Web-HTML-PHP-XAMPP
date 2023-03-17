<html lang="en">
<body>
    <?php 
        include_once 'template/header.php';
    ?>
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        include "$page.php";
    }
    else{
        include 'home.php';
    }
    ?>
    <?php 
        include_once 'template/footer.php';
    ?>
</body>
</html>

