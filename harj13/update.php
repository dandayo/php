<?php
require "connection.php";

if(!isset($_GET["id"])) {
    header("Location:update.php");  //uudelleenohjaus, palaa takaisin 
} else  $id = $_GET["id"];

$sql ="SELECT * FROM uutinen WHERE id = ?";

$stm = $pdo->prepare($sql);
$stm->bindValue(1, $id);
$stm->execute();

$uutinen = $stm->fetchAll(PDO::FETCH_ASSOC);

$id = $player[0]["id"];
$otsikko = $uutinen[0]["otsikko"];
$sisalto = $uutinen[0]["sisalto"];
$kirjoituspvm = $uutinen[0]["kirjoituspvm"];
$poistamispvm = $uutinen[0]["poistamispvm"];
$kirjoittaja = $uutinen[0]["kirjoittaja"];
?>

<!doctype html>
<html lang="fi">
<head>
<meta charset ="utf-8">
<title>update</title>
</head>
<body>

<form method="post" action = "updatepost.php">
<label for="id">id</label><br>
<input type="id" name="id" value="<?= $id;?>" required><br>

<form method="post" action = "updatepost.php">
<label for="id">otsikko</label><br>
<input type="otsikko" name="otsikko" value="<?= $otsikko;?>" required><br>

<form method="post" action = "updatepost.php">
<label for="sisalto">sisalto</label><br>
<input type="text" name="sisalto" value="<?= $sisalto;?>" required><br>

<form method="post" action = "updatepost.php">
<label for="kirjoituspvm">kirjoituspvm</label><br>
<input type="date" name="kirjoituspvm" value="<?= $kirjoituspvm;?>" required><br>

<form method="post" action = "updatepost.php">
<label for="poistamispvm">poistamispvm</label><br>
<input type="date" name="poistamispvm" value="<?= $poistamispvm;?>" required><br>

<form method="post" action = "updatepost.php">
<label for="kirjoittaja">kirjoittaja</label><br>
<input type="text" name="kirjoittaja" value="<?= $kirjoittaja;?>" required><br>

<input type="sumbit" value="Lisää">
</form>

</body>
</html>