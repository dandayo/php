<!doctype html>
<html lang="fi">
<head>
<meta charset ="utf-8">
<title>Harj13</title>
</head>
<body>
<form method="post">
<label for="otsikko">otsikko</label><br>
<input type="text" name="otsikko" required><br>

<label for="sisalto">sisalto</label><br>
<input type="text" name="sisalto" required><br>

<label for="kirjoituspvm">kirjoituspvm</label><br>
<input type="date" name="kirjoituspvm" required><br>

<label for="poistamispvm">poistamispvm</label><br>
<input type="date" name="poistamispvm" required><br>

<label for="kirjoittaja">kirjoittaja</label><br>
<input type="text" name="kirjoittaja" required><br>

<br>
<input type="submit" value="sumbit">
</form>

</body>
</html>

<?php
require "connection.php";
require "helper.php";

if(isset($_POST["otsikko"],$_POST["sisalto"],$_POST["kirjoituspvm"],$_POST["poistamispvm"],$_POST["kirjoittaja"])) {
    $otsikko = $_POST["otsikko"];
    $sisalto = $_POST["sisalto"];
    $kirjoituspvm = $_POST["kirjoituspvm"];
    $poistamispvm = $_POST["poistamispvm"];
    $kirjoittaja = $_POST["kirjoittaja"];

    $sql = "INSERT INTO uutinen(otsikko,sisalto,kirjoituspvm,poistamispvm,kirjoittaja) VALUES (?,?,?,?,?)";

    $stm = $pdo->prepare($sql);

    $stm->execute(array($otsikko,$sisalto,$kirjoituspvm,$poistamispvm,$kirjoittaja));
}

//require "connection.php";
echo "<h2>Uutiset</h2>";

$sql = "SELECT id,otsikko FROM uutinen"; //id missing in table

$statement = $pdo->query($sql);

$uutinen = $statement->fetchAll(PDO::FETCH_CLASS);

foreach($uutinen as $uutinen) {
    echo $uutinen->otsikko."<a herf=\"delete.php?id=".$uutinen->id.",\">Poista</a>
    <a herf=\"update.php?id=".$uutinen->id."\"Muokka</a><br>";
}

?>