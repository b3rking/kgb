<?php 
// include classes and objects
require_once '../vendor/autoload.php';

// some imports

use src\config\Database;
use src\helper\Validator;
use src\objects\Note;
use src\objects\User;

// get database connection

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$note = new Note($db);

$action = $_GET['action'];

if(isset($action) && !empty($action)) {
    
    switch ($action) {
        case "add_user":
            $validate = new Validator();
            $user_valid = $validate->Username($_POST['username']);
            $password_valid = $validate->Password($_POST['password'], $_POST['confirmpass']);
            if($user_valid) {
                if($password_valid) {
                    $user->username = $_POST['username'];
                    $user->fullname = $_POST['fullname'];
                    $user->email = $_POST['email'];
                    $user->password = $_POST['password'];
                    if($user->save()) {
                        header('Location: ../index.php?m='.$user->username);
                        // sign in the user
                    }
                } else {
                    $errors = "your passwords don't match";
                    header('Location: ../register.php?errors='.$errors);
                }
            } else {
                $errors = 'username must contain min 5 caracters and max 20 caracters';
                header('Location: ../register.php?errors='.$errors);
            }
            break;

        case "add_note":
            $validate = new Validator();
            $_COOKIE['user_id'] = 4;
            $user_obj = new User($db);
            if(isset($_COOKIE['user_id'])) {
                $user_obj = $user_obj->getOne($_COOKIE['user_id']);
                while ($res = $user_obj->fetch(PDO::FETCH_ASSOC)) {
                    extract($res);
                    $user_id = $id;
                }
            } else {
                echo "no user found!";
            }
            $note->title = $_POST['title'];
            $note->user_id = $user_id;
            $note->body = $_POST['body'];

            if($note->save()) {
                $message = 'successfuly created your note';
                header('Location: ../account.php?m='.$message); }
            else {
                $error = 'failed to create your note';
                header('Location: ../account.php?e='.$error); }
            break;

        case "update":

            echo "i'm gonna update someone face! :)";
            break;

        default:
            echo "don't play with me, i can see u!(0_0)";
            break;
    }
} else {
    header("Location: ../index.php");
}
