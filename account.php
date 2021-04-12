<?php
$page_text = "User account page - KGB Team";
include "includes/header.php"; ?>

<section class="pega1">
  <div class="Post_details">
    <img class="profile_img" src="../img/j.png" alt="" width="150" height="150">
    <div class="post_textes">
      <h1>Pele Jean</h1>
      <h3>Php motion developer</h3>
      <h3>Web artisan on youtube</h3>
      <h3>Django Master</h3>
      <h3>Girl lover</h3>
      <h3>@pelejean1995</h3>

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
        <input type="submit" value="post notes">
      </form>
    </div>
    <?php include "includes/footer.php"; ?>
  </div>
</section>