<?php include "starter/header.php"; ?>

<body class="body_form">
    <nav>
        <div class="nav-bar">
            <div class="first-menu">
                <div class="logo">
                    <a href="index.html">KGB Team</a>
                </div>
                <div class="nav-bar-link">
                    <a href="index.html">Home</a>
                    <a href="login.html">Account</a>
                </div>
            </div>
            <div class="second-menu">
                <div class="search_box">
                    <input type="search" name="search" class="search">
                    <button type="submit" class="submit-btn"><i class="fas fa-search"></i></span></button>
                </div>
            </div>
        </div>
    </nav>
    <section class="pega_form">
        <form>
            <h1>Sign In</h1>
            <div class="inputBox">
                <input type="email" name="" required>
                <label>Email address</label>
            </div>
            <div class="inputBox">
                <input type="password" name="" required>
                <label>Password</label>
            </div>
            <div class="button_form">
                <button name="sign-in" type="submit">Sign in</button>
            </div>
            <p>New in KGB Team? <a href="register.php" title="click here to create an account">Join here</a></p>
        </form>
    </section>
    <div class="footer">
        <p>HGB Team copyright <span class="year"></span></p>
    </div>
    <script src="../js/app.js"></script>
</body>
</html>