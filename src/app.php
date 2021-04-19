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
                        // redirect to the home page
                        header('Location: ../index.php');
                        // with the success message in get
                        // sign in the user automaticaly
                        $response = json_encode(['message' => 'success']);
                    } else {
                        // return back to the formular
                        // with the errors
                        $response = json_encode(['message' => 'failed']);
                    }
                    var_dump($response);
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
            echo "i work with notes...";
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
