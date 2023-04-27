<html lang="en">

<body>
    <?php
    include_once 'template/header.php';
    ?>
    <div class="body">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            include "pages/$page/$page.php";
        } else {
            include 'pages/home/home.php';
        }
        ?>
    </div>
    <?php
    include_once 'template/footer.php';
    ?>
</body>

</html>