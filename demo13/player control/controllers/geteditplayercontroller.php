<?php
require "./database/models/Player.php";

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $player = getPlayerById($id);
    require "./views/editplayerform.view.php";
}