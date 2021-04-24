<?php
require_once 'vendor/autoload.php';
$page_title = "Become one of us - KGB Team";
include "includes/header.php"; ?>

    <section class="pega_form">
        <form action="src/app.php?action=add_user" method="POST">
            <h1>Complete this form to join us</h1>
            <?php if(isset($_GET['errors'])): ?>
                <div class="alert-box error">
                    <?php echo $_GET['errors']; ?>
                </div>
            <?php endif ?>
            <div class="inputBox">
                <input type="text" name="fullname" required>
                <label>Fullname</label>
            </div>
            <div class="inputBox">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="inputBox">
                <input type="email" name="email" required>
                <label>Email address</label>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="inputBox">
                <input type="password" name="confirmpass" required>
                <label>Confirm Password</label>
            </div>
            <div class="button_form">
                <button name="sign-in" type="submit">Sign Up</button>
            </div>
            <p>Already a member?<a href="login.php" title="click here to create an account">Get in</a></p>
        </form>
    </section>

<?php include "includes/footer.php"?>