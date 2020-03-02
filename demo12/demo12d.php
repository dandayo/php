<!doctype html>
<html lang="fi">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>PDO demo 12e</title>
</head>
<body>
<?php
require "connection.php";  //1. OTA YHTEYS KANTAAN

echo "<h2>Kaikki käyttäjätunnukset (FETCH_ASSOC)</h2>";

$sql = "SELECT account_name FROM players"; // 2. RAKENNA SQL
// $statement saa vastauksena sql-kyselyn tuloksen
$statement = $pdo->query($sql); //3. SUORITA SQL

//haetaan vastaus php-muuttujaan (taulukko, assosiatiivinen)
$players = $statement->fetchAll(PDO::FETCH_ASSOC); //4. KÄSITTELE VASTAUS

foreach($players as $player) {
    echo $player["account_name"]."<br>"; // jos olisi haettu FETCH_CLASS $player->account_name
}

echo "<h2>Kaikki käyttäjätunnukset ja sähköpostiosoitteet (FETCH_CLASS)</h2>";

$sql = "SELECT account_name,email FROM players";
// $statement saa vastauksena sql-kyselyn tuloksen
$statement = $pdo->query($sql);

//haetaan vastaus php-muuttujaan (taulukko, assosiatiivinen)
$players = $statement->fetchAll(PDO::FETCH_CLASS);

foreach($players as $player) {
    echo $player->account_name." ".$player->email."<br>"; 
}

echo "<h2>Kaikki täänään kirjautuneet pelaajat (FETCH_NUM)</h2>";

$sql = "SELECT account_name FROM players WHERE last_login = CURDATE()";
// $statement saa vastauksena sql-kyselyn tuloksen
$statement = $pdo->query($sql);

//haetaan vastaus php-muuttujaan (taulukko, assosiatiivinen)
$players = $statement->fetchAll(PDO::FETCH_NUM);

foreach($players as $player) {
    echo $player[0]."<br>"; 
}

echo "<h2>Kaikki tänään kirjautuneet pelaajat (FETCH_CLASS)</h2>";

$sql = "SELECT account_name FROM players WHERE banned = 0";
// $statement saa vastauksena sql-kyselyn tuloksen
$statement = $pdo->query($sql);

//haetaan vastaus php-muuttujaan (taulukko, assosiatiivinen)
$players = $statement->fetchAll(PDO::FETCH_CLASS);

foreach($players as $player) {
    echo $player->account_name."<br>"; 
}
?>
</body>
</html>