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

if (!$is_auth) {
  header('Location: login.php');
}

$user = $user->getOneById($_GET['id']);
?>

<section class="pega1">
  <div class="Post_details">
    <div class="image">
       <img class="profile_img" src="img/j.png" alt="">
    </div>
    <div class="post_textes">
      <?php
      while ($res = $user->fetch(PDO::FETCH_ASSOC)) :
        extract($res);
      ?>
        <h1><?php echo $username; ?></h1>
        <h3><?php echo $fullname; ?></h3>
        <p><?php echo $bio; ?></p>
        <p><strong><em><?php echo $status; ?></em></strong></p>
      <?php endwhile ?>
      <a href="#" id="mod">Modify</a>
    </div>
  </div>


<div class="modal_bg" style="display: none">
    
</div>
<div class="modal_container" style="display: none">
  <div class="modal_body">
    <div class="modal_header">
      <h3>Update your profile</h3>
      <span class='modal_x'><i class="far fa-window-close"></i></span>
    </div>
    <form action="src/app.php?action=update" method="POST">
        <div class="input-box">
          <label for="username">username</label>
          <input class="inputBox" class="inp" type="text" name="username">
        </div>

        <div class="input-box">
          <label for="fullname">fullname</label>
          <input  class="inputBox" type="text" name="fullname">
        </div>

        <div class="input-box">
          <label for="email">email</label>
          <input  class="inputBox" type="email" name="email">
        </div>

        <div class="input-box">
          <label for="status">status</label>
          <input  class="inputBox" type="text" name="status">
        </div>

        <div class="input-box">
          <label for="password">password</label>
          <input  class="inputBox" type="password" name="password">
        </div>

        <div class="input-box">
          <label for="fullname">profile pic</label>
          <input  class="inputBox" type="file" name="profile_pic">
        </div>

        <textarea  id="update" name="bio"  cols="30" rows="10">here goes your bio!</textarea>
        <button type="submit" class="btn">update user</button>
      </form>
  </div>
</div>
  



  <div class="diary_interface">
    <h1 class="title_di">Diary Poster Interface</h1>
    <div class="interface">
      <form action="src/app.php?action=add_note" method="POST">
        <div class="input-box">
          <label for="title">title</label>
          <input type="text" name="title" id="title">
        </div>
        <div>
          <textarea name="body" id="amazing_text" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn">post notes</button>
      </form>
    </div>
  </div>
</section>

<?php include "includes/footer.php"; ?>