<?php
// starting sessions
session_start();
// include classes and objects

use src\config\Database;
use src\objects\Note;
use src\objects\User;
use src\classes\Auth;

require_once 'vendor/autoload.php';

// get database connection

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$note = new Note($db);

$page_title = "User personal page - KGB Team";
include "includes/header.php";

if(!$is_auth) {
   header('Location: login.php');
}

$user = $user->getOne($_COOKIE['username']);

if(isset($_GET['id']) && !empty($_GET['id'])) {
  $owner_object = new User($db);
  $ow = $owner_object->getOneById($_GET['id']);
  while($res = $ow->fetch(PDO::FETCH_ASSOC)) {
    extract($res);
  }
  $owner_username = $username;
}

$owner = new Auth();

?>

<section class="pega1">
  <div class="Post_details">
    <img class="profile_img" src="../img/j.png" alt="" width="150" height="150">
    <div class="post_textes">
      <?php 
      while($res = $user->fetch(PDO::FETCH_ASSOC)): 
      extract($res);
      ?>
      <?php 
      $is_owner = $owner->is_owner($owner_username, $username); 
      echo $is_owner;
      ?>
      <h1><?php echo $username; ?></h1>
      <h3><?php echo $fullname; ?></h3>
      <p><?php echo $bio; ?></p>
      <p><strong><em><?php echo $status; ?></em></strong></p>
      <?php endwhile ?>
    </div>
    <div class="boutons">
      <a href="">Modify</a>
    </div>
  </div>
  <form action="src/app.php?action=update" method="POST">
      <div class="input-box">
        <label for="username">username</label>
        <input type="text" name="username">
      </div>

      <div class="input-box">
        <label for="fullname">fullname</label>
        <input type="text" name="fullname">
      </div>

      <div class="input-box">
        <label for="email">email</label>
        <input type="email" name="email">
      </div>

      <div class="input-box">
        <label for="status">status</label>
        <input type="text" name="status">
      </div>

      <div class="input-box">
        <label for="password">password</label>
        <input type="password" name="password">
      </div>

      <div class="input-box">
        <label for="fullname">profile pic</label>
        <input type="file" name="profile_pic">
      </div>

      <textarea name="bio" cols="30" rows="10">here goes your bio!</textarea>
      <button type="submit" class="btn">update user</button>
    </form>

  <div class="diary_interface">
    <h1 class="title_di">Diary Poster Interface</h1>
    <div class="interface">
      <br>
      <div class="wyswyg">@wyswyg import module....................</div>
      <div class="borderf"></div>
      <form action="src/app.php?action=add_note" method="POST">
          <?php if(isset($_GET['errors'])): ?>
              <div class="alert-box error">
                  <?php echo $_GET['errors']; ?>
              </div>
          <?php endif ?>
          <?php if(isset($_GET['m'])): ?>
              <div class="alert-box success">
                  <?php echo $_GET['m']; ?>
              </div>
          <?php endif ?>
        <h1>add note</h1>
        <div class="input-box">
          <label for="title">title</label>
          <input type="text" name="title" id="title">
        </div>
        <div class="input-box">
          <label for="body">notes</label>
          <textarea name="body" id="body" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn">post notes</button>
      </form>
    </div>
    <?php include "includes/footer.php"; ?>
  </div>
</section>