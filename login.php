<body>
    <h1>Login</h1>
    <div>

        <form name="loginForm" method="post" action="login_processing.php" onsubmit="return CheckValidity()">
            <label>Username</label>
            <input type="text" id="username" name="username" placeholder="username" autocomplete="on" min="4" max="20"
                required>
            <label>Password</label>
            <input type="password" name="password" placeholder="password" required>
            <button type="submit" name="submit">Login</button>
        </form>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "wronglogin") {
                echo "<p id=\"error\">Incorrect username or password!</p>";
            } elseif ($_GET['error'] == "loginFailed") {
                echo "<p id=\"error\">Something went wrong!</p>";
            } elseif ($_GET['error'] == "usernameShort") {
                echo "<p id=\"error\">Username must be at least 4 characters!</p>";
            } else {
                $user = $_GET['error'];
                echo "<script>document.getElementById(\"username\").value=\"$user\";</script>";
                echo "<p id=\"error\">Incorrect username or password!</p>";
            }
        }
        ?>
        <div id="validation"></div>
    </div>

    <!-- Form validation Client side -->
    <script>
        function CheckValidity() {
            const user = document.getElementById("username");
            if (!user.checkValidity()) {
                document.getElementById("validation").innerHTML = user.validationMessage;
                return false;
            }
            return true;
        }
    </script>
</body>