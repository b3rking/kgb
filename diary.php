<?php
// starting sessions
session_start();
// include classes and objects

use src\config\Database;
use src\objects\Note;
use src\objects\User;


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

$list_note = $note->all();
?>
<section>
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