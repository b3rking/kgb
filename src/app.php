<?php 
// include classes and objects

use src\config\Database;
use src\objects\Note;
use src\objects\User;

include_once "config/Database.php";
include_once "objects/user.php";
include_once "objects/note.php";

// get database connection

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$note = new Note();

$action = $_GET['action'];

if(isset($action) && !empty($action)) {
    switch ($action) {
        case "add_user":
            $user->username = $_POST['username'];
            $user->fullname = $_POST['fullname'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->id = 0;
            
            break;
        case "add_note":
            echo "i work with notes...";
            break;

        default:
            echo "don't play with me, i can see u!(0_0)";
            break;
    }
} else {
    header("Location: ../index.php");
}

?>
