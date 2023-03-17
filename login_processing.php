<?php
session_start();

// Get the email and password from the form data
$username = $_POST['username'];
$password = $_POST['password'];

if (isset($username)){
    echo "It works";
}
// Look up the user in the database
$db = new mysqli('localhost', 'root', '', 'OnlineStore');
$query = "SELECT * FROM users WHERE username='$username'";
$result = $db->query($query);

// Check if the user exists and the password matches
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Password is correct, log the user in
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_level'] = $user['level'];
        setcookie('user_id', $user['user_id'], time()+3600, '/');
        setcookie('user_name', $user['name'], time()+3600, '/');
        setcookie('user_level', $user['level'], time()+3600, '/');
        header('Location: index.php?page=home');
    } else {
        // Password is incorrect
        $_SESSION['error'] = 'Incorrect username or password!';
        header('Location: index.php?page=login');
    }
} else {
    // User doesn't exist
    $_SESSION['error'] = 'Incorrect username or password!';
    header('Location:   index.php?page=login');
}
?>
