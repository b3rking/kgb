<?php 
// include classes and objects
require_once '../vendor/autoload.php';

// some imports

use src\classes\Auth;
use src\config\Database;
use src\classes\Validator;
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
                        $log = new Auth();
                        $log->login($user->username);
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
            if(isset($_COOKIE['username'])) {
                $title = $_POST['title'];
                $body = $_POST['body'];
                $username = $_COOKIE['username'];
                $data = $user->getOne($username);

                while ($res = $data->fetch(PDO::FETCH_ASSOC)) {
                    extract($res);
                    $user_id = $id;
                }

                $validate = new Validator();
                $title_valid = $validate->noteTitle($_POST['title']);
                $body_valid = $validate->noteBody($_POST['body']);

                if($title_valid && $body_valid) {
                    $note->title = $title;
                    $note->user_id = $user_id;
                    $note->body = $body;

                    if($note->save()) {
                        $message = 'successfuly created your note';
                        header('Location: ../account.php?m='.$message);
                    }
                    else {
                        $errors = 'failed to create your note';
                        header('Location: ../account.php?errors='.$errors);
                    }
                } else {
                    $errors = "title has max 200 caracters and body allow up to 1000 caracters!";
                    header('Location: account.php?errors='.$errors);
                }
            } else {
                echo "no user found!";
            }
            
            break;

        case "login":
            $username = $_POST['username'];
            $user_password = $_POST['password'];
            $query = "select username, password from users where username=:username";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $username);
            $result = $stmt->execute();
            while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($res);
            }
            if($user_password == $password) {
                $log = new Auth();
                if($log->login($username)) {
                    header('Location: ../index.php');
                }
            } else {
                $errors = "sorry, i don't recognize you";
                header('Location: ../login.php?errors='.$errors);
            }

            break;

        case "logout":
            echo "hello";
            $auth = new Auth();
            $auth->logout();
            header('Location: ../login.php');
            break;

        case "update":

            echo "i'm gonna update someone face! :)";
            break;

        default:
            echo "don't play with me, i can see u!(0_0)";
            break;
    }
} 
else {
   header("Location: ../index.php");
}
