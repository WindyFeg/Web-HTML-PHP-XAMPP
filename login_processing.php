<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'database.php';
    require_once 'functions.php';

    //$ Check for empty input
    if(emptyInputLogin($username, $password) !== false){
        header("location: ../index.php?page=login&error=emptyinput");
        exit();
    }

    //$ Check if user exists
    loginUser($conn, $username, $password);
}
else{
    header("location: ../index.php?page=login");
    exit();
}