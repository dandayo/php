<!doctype html>
<html lang="fi">
<head>
<meta charset ="utf-8">
<title>PDO demo 12e</title>
</head>
<body>

<form method="post">
<label for="aname">Käyttäjätunnus</label><br>
<input type="text" name="aname" required><br>

<label for="passwd">Salasana</label><br>
<input type="password" name="passwd" required><br>

<label for="passwd2">Salasana uudestaan</label><br>
<input type="password" name="passwd2" required><br>



<label for="email">Sähköposti</label><br>
<input type="email" name="email" required><br>

<label for="character">Hahmo</label>
<select name="character" required>
    <option value="hirviö">hirviö</option>
    <option value="olio">olio</option>
    <option value="keiju">keiju</option>
</select>
<br>
<input type="submit" value="Lisää pelaaja">
</form>

</body>
</html>

<?php
require "connection.php";
require "helper.php";

if(isset($_POST["aname"],$_POST["passwd"],$_POST["passwd2"],$_POST["email"],$_POST["character"]) && $_POST["passwd"] == $_POST["passwd2"]) {
    $name = sanit($_POST["aname"]);
    $passu = sanit($_POST["passwd"]);
    $email = sanit($_POST["email"]);
    $character = sanit($_POST["character"]);
    $last_login = date('Y-m-d');

    $sql = "INSERT INTO players(account_name,password,email,last_login,online,money,current_character,banned) VALUES (?,?,?,?,?,?,?,?)";

    $stm = $pdo->prepare($sql);

    $stm->execute(array($name,$passu,$email,$last_login,1,100,$character,0));
}
else {
    echo "Tarkista syötteet, salasanat eivät vastaa toisiaan";
}

$sql = "SELECT account_name FROM players"; // 2. RAKENNA SQL
// $statement saa vastauksena sql-kyselyn tuloksen
$statement = $pdo->query($sql); //3. SUORITA SQL

//haetaan vastaus php-muuttujaan (taulukko, assosiatiivinen)
$players = $statement->fetchAll(PDO::FETCH_ASSOC); //4. KÄSITTELE VASTAUS

foreach($players as $player) {
    echo $player["account_name"]."<br>"; // jos olisi haettu FETCH_CLASS $player->account_name
}
?>