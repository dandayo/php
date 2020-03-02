<?php
require "connection.php";

  
if(!isset($_GET["id"])) {
    header("Location:index.php");
}
else  $id = $_GET["id"];

$sql = "DELETE FROM uutinen WHERE id = ?";

$stm = $pdo->prepare($sql);
$stm->bindValue(1, $id);
$stm->execute();

header("Location:index.php");
?>
