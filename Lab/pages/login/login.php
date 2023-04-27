<body>
    <div class="centre">
        <img class="login_pageName" src="/assets/img/page_name.png"></img>
    </div>
    <h1 id="windyfeng--background">
        WINDY
        FENG
    </h1>
    <h1 id="windyfeng">
        WINDY
        FENG
    </h1>
    <div id="half_screen">.
    </div>
    <div class="login_container">
        <form class="login_form" name="loginForm" method="post" action="/pages/login/login_processing.php"
            onsubmit="return CheckValidity()">
            <div class="login_field">
                <label class="login_label">Username:</label>
                <input class="login_input" type="text" id="username" name="username" placeholder="username"
                    autocomplete="on" min="4" max="20" required>
            </div>
            <div class="login_field">
                <label class="login_label">Password:</label>
                <input class="login_input" type="password" name="password" placeholder="password" required>
            </div>

            <button class="login_btn" type="submit" name="submit">></button>
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