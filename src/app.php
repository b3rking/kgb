<?php 
// include classes
include_once "database"


$action = $_GET['action'];

switch ($action) {
    case "add":
        echo "yes i'm gonna save it! using switch duh!";
        break;

    default:
        echo "don't play with me, i can see u!(0_0)";
        break;
}
?>
