<?php
require "./database/models/Player.php";
$players = getAllPlayers();
  
if(isset($_GET["id"])) {
    $id= $_GET["id"];
    deletePlayer($id);
    require "./views/index.view.php";
}
else {
    $message ="Poistaminen ei onnistu";
    require "./views/index.view.php";   
}
