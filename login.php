<body>
    <h1>Login</h1>
    <div>
        <form method="post" action="login_processing.php">
            <label>Username</label>
            <input type="text" name="username" placeholder="username"> 
            <label>Password</label>
            <input type="password" name="password" placeholder="password"> 
            <button type="submit" name="submit">Login</button>
        </form>
        <?php 
            if (isset($_GET['error'])){
                if ($_GET['error'] == "emptyinput"){
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET['error'] == "wronglogin"){
                    echo "<p>Incorrect login information!</p>";
                }
                elseif ($_GET['error'] == "loginFailed"){
                    echo "<p>Something went wrong!</p>";
                }
            }
        
        ?>
    </div>
</body>