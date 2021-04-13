<?php
// starting sessions

// include classes and objects

use src\config\Database;
use src\objects\Note;
use src\objects\User;

include_once "src/config/Database.php";
include_once "src/objects/user.php";
include_once "src/objects/note.php";

// get database connection

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$note = new Note();


if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  header("Location: index.php");
}

$user = $user->getOne($id);

$page_text = "User personal page - KGB Team";
include "includes/header.php"; 
?>


<section class="pega1">
  <div class="Post_details">
    <img class="profile_img" src="../img/j.png" alt="" width="150" height="150">
    <div class="post_textes">
      <?php 
      while($res = $user->fetch(PDO::FETCH_ASSOC)): 
      extract($res);
      ?>
      <h1><?php echo $username; ?></h1>
      <h3><?php echo $fullname; ?></h3>
      <?php endwhile ?>
    </div>
    <div class="boutons">
      <a href="">Modify</a>
    </div>
  </div>

  <div class="diary_interface">
    <h1 class="title_di">Diary Poster Interface</h1>
    <div class="interface">
      <br>
      <div class="wyswyg">@wyswyg import module....................</div>
      <div class="borderf"></div>
      <form action="src/app.php?action=add" method="POST">
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