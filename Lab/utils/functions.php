<?php

function usernameExists($conn, $username)
{
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //! handle loginFailed
        header("location: ../login.php?error=loginFailed");
        exit();
    }

    //$S prevent SQL injection
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    //$ get Data
    $resultData = mysqli_stmt_get_result($stmt);

    //$ return data in array by row
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}

function pass_check($password, $passwordRepeat)
{
    if ($password === $passwordRepeat) {
        return true;
    } else {
        return false;
    }
}

function emptyInputLogin($username, $password)
{
    if (empty($username) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

function serverCheckValidity($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

function loginUser($conn, $username, $password)
{
    //$ Data if exits else false
    $usernameExists = usernameExists($conn, $username);

    echo $usernameExists;

    if ($usernameExists === false) {
        header("location: ../index.php?page=login&error=$username");
        exit();
    }

    //$ verify password
    $pwdHashed = $usernameExists["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../../index.php?page=login&error=$username");
        exit();
    } else if ($checkPwd === true) {
        //$ Start session to store data
        session_start();
        $_SESSION["username"] = $usernameExists["username"];
        $_SESSION["userlevel"] = $usernameExists["userlevel"];
        header("location: ../../index.php?page=home");
        exit();
    }
}