<?php 
$page_title = "Login here - KGB Team";
include "includes/header.php"; ?>

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