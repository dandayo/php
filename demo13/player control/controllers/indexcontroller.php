<?php
require "./database/models/Player.php";
$players = getAllPlayers();
//var_dump($players);
require "./views/index.view.php";
?>