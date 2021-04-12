<?php
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

$list_user = $user->all();

$page_title = "KGB Team - official website!";
include "includes/header.php"; 

?>

  <section class="body-container">
    <div class="kgb_members">
      <div class="kgb_members_header">
        <h2>our actual members</h2>
      </div>
      <?php 
      while ($res = $list_user->fetch(PDO::FETCH_ASSOC)) : 
      extract($res);
      ?>
      <div class="user">
        <div class="user-data">
          <img src="../img/j.png" alt="username - profile pic">
          <div class="user-data_names">
            <p class="fullname"><?php echo $fullname; ?></p>
            <p class="username">@<?php echo $username; ?></p>
          </div>
        </div>
        <div class="link">
          <a href="#">his diary</a>
        </div>
      </div>
      <?php endwhile ?>

    </div>
    <div class="recent_post">
      <h2>recent post from membersssss</h2>
    </div>
  </section>

<?php include "includes/footer.php"; ?>