<?php
require_once 'vendor/autoload.php';
$page_title = "Login here - KGB Team";
include "includes/header.php"; ?>

    <section class="pega_form">
        <form>
            <h1>Start here...</h1>
            <div class="inputBox">
                <input type="username" name="" required>
                <label>username</label>
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