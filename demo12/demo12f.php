<?php
require "connection.php";  //1. OTA YHTEYS KANTAAN

$sql = "SELECT id,account_name FROM players";//2.

$statement = $pdo->query($sql); //3.

//haetaan vastaus php-muuttujaan (taulukko, assosiatiivinen) //4.
$players = $statement->fetchAll(PDO::FETCH_CLASS);

foreach($players as $player) {
    echo $player->account_name."<a href=\"demo12g.php?id=".$player->id."\">Poista</a>  
    <a href=\"demo12h.php?id=".$player->id."\">Muokkaa</a><br>"; 
}