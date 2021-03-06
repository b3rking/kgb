<?php

use src\classes\Auth;
use src\classes\CookieManager;

require_once 'vendor/autoload.php';

$auth = new Auth();
$is_auth = $auth->is_auth();

$cookie = new CookieManager();
$username = $cookie->getCookie('username');

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="kgb team official website">
  <meta name="keywords" content="kgb team official website">
  <meta name="keywords" content="kgb ult team, kgb burundi, kgb developers team">
  <meta name="author" content="B3rking, pegasus03, and other contributors">
  <title><?= $page_title ?></title>
  
  <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
  <link rel="manifest" href="favicons/site.webmanifest">
  <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#01497C">
  
  <link rel="stylesheet" href="css/app.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
</head>
<?php $auth = "de"; ?>
<body>
  <nav>
    <div class="nav-bar">
      <div class="first-menu">
        <div class="logo">
          <a href="index.php">KGB Team</a>
        </div>
        <div class="nav-bar-link">
          <a href="index.php">Home</a>
          <?php if($is_auth == 1): ?>
            <a href="../src/app.php?action=logout">logout <?php echo $username; ?></a>
            <a href="../account.php">account</a>
          <?php else: ?>
            <a href="login.php">Login</a>         
          <?php endif ?>
        </div>
      </div>
      <div class="responsive">
        <a href="" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
      </div>
      <div class="second-menu">
        <div class="search_box">
          <input type="search" name="search" class="search">
          <button type="submit" class="submit-btn"><i class="fas fa-search"></i></span></button>
        </div>
      </div>
    </div>
  </nav>