<?php 
    if(isset($_POST["alo"])){
        echo "Login button was pressed";
    }
    else {
        header("Location: index.php");
    }
?>