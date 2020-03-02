<?php
include "/partials/head.php";
//var_dump($player);

if(isset($message)) echo $message;?>

<form method="post">
<label for="aname">Käyttäjätunnus</label><br>
<input type="text" name="aname" value= "<?= $player[0]->account_name;?>" required><br>

<input type="hidden" name="id" value="<?= $player[0]->id;?>">

<!--
<label for="passwd">Salasana</label><br>
<input type="password" name="passwd" required><br>

<label for="passwd2">Salasana uudestaan</label><br>
<input type="password" name="passwd2" required><br>-->

<label for="email">Sähköposti</label><br>
<input type="email" name="email" value ="<?= $player[0]->email;?>" required><br>

<label for="money">Rahaa</label><br>
<input type="number" name="money" value ="<?= $player[0]->money;?>" required><br>

<label for="character">Hahmo</label>
<select name="character" required>
    <option value="hirviö" <?php if($player[0]->current_character == "hirviö") echo "selected";?>>hirviö</option>
    <option value="olio" <?php if($player[0]->current_character == "olio") echo "selected";?>>olio</option>
    <option value="keiju" <?php if($player[0]->current_character == "keiju") echo "selected";?>>keiju</option>
</select>
<br>
<label for="banned">Bannattu</label>
<input type ="checkbox" <?php if($player[0]->banned == 0) echo "value=\"0\"";
else echo "value=\"1\" checked";?>><br>

<input type="submit" value="Muuta pelaajaa">
</form>

<?php
include "/partials/end.php";
?>