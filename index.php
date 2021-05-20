<?php
session_start();
// include classes and objects

use src\classes\Auth;
use src\config\Database;
use src\objects\Note;
use src\objects\User;

require_once 'vendor/autoload.php';

// get database connection

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$note = new Note($db);

$list_user = $user->all();
$list_note = $note->all();

$page_title = "KGB Team - official website!";
include "includes/header.php";

if(!$is_auth) {
    header('Location: login.php');
}

?>
<?php if (isset($_GET['m'])): ?>
    <div class="alert-box success">
        welcome <strong><?php echo $_GET['m']; ?></strong> on KGB Team official website!
    </div>
<?php endif ?>
  <section class="body-container">

    <div class="kgb_members">
      <div class="kgb_members_header">
        <h2>Our actual member</h2>
      </div>
      <?php 
      while ($res = $list_user->fetch(PDO::FETCH_ASSOC)) : 
      extract($res);
      ?>
      <div class="user">
        <div class="user-data">
          <img src="<?php echo $profile_pic; ?>" alt="username - profile pic" class="avatar">
          <div class="user-data_names">
            <p class="fullname"><?php echo $fullname; ?></p>
            <p class="username">@<?php echo $username; ?></p>
          </div>
        </div>
        <div class="link">
          <a href="diary.php?id=<?php echo $id; ?>">his diary</a>
        </div>
      </div>
      <span class="baruser"></span>
      <?php endwhile ?>

    </div>
    <div class="recent_post">
      <h2 class="label_post">Recent post from membersssss</h2>
      <?php 
      while ($res = $list_note->fetch(PDO::FETCH_ASSOC)) : 
      extract($res);
      ?>
      <div class="notes">
        <div class="label_title">
        <h2 class="label_h2"><?php echo $title; ?></h2>
        </div>
        <div class="content">
        <p><?php echo $body; ?></p>
        </div>
      </div>
      <?php endwhile ?>
    </div>
  </section>

<?php include "includes/footer.php"; ?>