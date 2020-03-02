<?php
require "connection.php";//1. yhteys

if(!isset($_GET["id"])) {
    header("Location:demo12f.php");  //uudelleenohjaus, palaa takaisin 
} else  $id = $_GET["id"];

$sql = "DELETE FROM players WHERE id = ?"; //2. luo sql

$stm = $pdo->prepare($sql);
$stm->bindValue(1, $id);
$stm->execute();

header("Location:demo12f.php");
?>