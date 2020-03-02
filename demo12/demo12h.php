<?php
require "connection.php";

if(!isset($_GET["id"])) {
    header("Location:demo12f.php");  //uudelleenohjaus, palaa takaisin 
} else  $id = $_GET["id"];

$sql ="SELECT * FROM players WHERE id = ?";

$stm = $pdo->prepare($sql);
$stm->bindValue(1, $id);
$stm->execute();

$player = $stm->fetchAll(PDO::FETCH_ASSOC);

$id = $player[0]["id"];
$account_name = $player[0]["account_name"];
$password = $player[0]["password"];
$email = $player[0]["email"];
$last_login = $player[0]["last_login"];
$money = $player[0]["money"];
$character = $player[0]["current_character"];
$banned = $player[0]["banned"];
?>

<!doctype html>
<html lang="fi">
<head>
<meta charset ="utf-8">
<title>PDO demo 12h - GET</title>
</head>
<body>

<form method="post" action = "demo12hpost.php">
<label for="aname">Käyttäjätunnus</label><br>
<input type="text" name="aname" value="<?= $account_name;?>" required><br>


<label for="email">Sähköposti</label><br>
<input type="email" name="email" value="<?= $email;?>" required><br>


<label for="character">Hahmo</label>
<select name="character" required>
    <option value="hirviö" <?php if($character == "hirviö") echo "selected";?>>hirviö</option>
    <option value="olio" <?php if($character == "olio") echo "selected";?>>olio</option>
    <option value="keiju" <?php if($character == "keiju") echo "selected";?>>keiju</option>
</select><br>

<label for="money">Rahaa</label>
<input type = "number" min="0" max = "10000" required name="money" value="<?= $money;?>"><br>

<p>Viimeksi kirjautunut <?= $last_login;?></p>
<br>

<label for="banned">Porttikiellossa</label><br>
Ei <input type ="radio" value="0" name="banned" <?php if($banned == "0") echo "checked";?>><br>
Kyllä <input type="radio" value ="1" name="banned" <?php if($banned == "1") echo "checked";?>><br>

<input type="submit" value="Muuta pelaajaa">
</form>

</body>
</html>
