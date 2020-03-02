<?php
//pyynnöt on muotoa index.php?action=edit&id=5

if(isset($_GET["action"])) $action = $_GET["action"];
else $action = "index"; //index on kotisivu
$method = strtolower($_SERVER['REQUEST_METHOD']);

switch($action) {
    case "index":
    require "./controllers/indexcontroller.php";
    break;

    case "addplayer":
    if($method =="get") require "./views/addplayerform.view.php";
    else require "./controllers/postaddplayercontroller.php";
    break;

    case "delete":
    require "./controllers/deletecontroller.php";
    break;

    case "edit":
    if($method == "get") require "./controllers/geteditplayercontroller.php";
    else require "./controllers/posteditplayercontroller.php";
    break;


    default:
    echo "404";
 }
