<?php
include "/partials/head.php";

if(isset($message)) echo $message;?>

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

<?php
include "/partials/end.php";
?>