<?php 
// include classes and objects
require_once '../vendor/autoload.php';

// some imports

use src\classes\Auth;
use src\config\Database;
use src\classes\Validator;
use src\objects\Note;
use src\objects\User;
use src\classes\Upload;


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
            
            if(isset($_FILES['profile_pic']) || isset($_POST['name'])) {
                $target = 'uploads/';
                $name = $target . basename($_FILES['profile_pic']['name']);
                $type = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                $size = $_FILES['profile_pic']['size'];
                $tmp_name = $_FILES['profile_pic']['tmp_name'];

                $upload_class = new Upload($name, $type, $size, $tmp_name);

                // check if it's an image
                if($upload_class->is_image()) {
                    // check if file already exist
                    if($upload_class->exists()) {
                        // check if file is allowed
                        if($upload_class->is_allowed()) {
                            // try uploading
                            $upload_class->try_uploading();
                            //check if it's uploaded
                            if($upload_class->is_uploaded()) {
                                echo "file is uploaded";
                            } else {
                                echo "not uploaded!";
                            }
                        } else {
                            echo "your format is not allowed!";
                        }
                    } else {
                        echo "file already exists!";
                    }
                } else {
                    echo "your file is not an image!";
                }
            }

            // filling the field!

            $validate = new Validator();
            $user_valid = $validate->Username($_POST['username']);

            if($user_valid) {
                $user->username = $_POST['username'];
                $user->fullname = $_POST['fullname'];
                $user->email = $_POST['email'];
                $user->profile_pic = $name;
                $user->bio = $_POST['bio'];
                $user->status = $_POST['status'];

                if($user->update($_COOKIE['username'])) {
                    header('Location: ../account.php?id='.$_GET['id']);
                    $log = new Auth();
                    $log->login($user->username);
                }

            } else {
                $errors = 'username must contain min 5 caracters and max 20 caracters';
                header('Location: ../account.php?errors='.$errors);
            }
            break;

        default:
            echo "don't play with me, i can see u!(0_0)";
            break;
    }
}
else {
   header("Location: ../index.php");
}