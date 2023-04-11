<?php
// Form validation Server side 
if (isset($_POST['submit'])) {

    require_once 'database.php';
    require_once 'functions.php';

    $username = serverCheckValidity($_POST['username']);
    $password = serverCheckValidity($_POST['password']);
    // $username = $_POST['username'];
    // $password = $_POST['password'];


    //$ Check for empty input
    if (emptyInputLogin($username, $password) !== false) {
        header("location: ../index.php?page=login&error=emptyinput");
        exit();
    }

    //$ Check if user exists
    loginUser($conn, $username, $password);
} else {
    header("location: ../index.php?page=login");
    exit();
}