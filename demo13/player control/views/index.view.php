<?php
include "/partials/head.php";
?>

<h1>Kaikki pelaajat</h1>
<p>
<?php foreach($players as $player) {
    ?>
    <h3><?= $player->account_name;?></h3>
    <a href="./index.php?action=edit&id=<?=$player->id;?>">Muokkaa</a><br>
    <a href="./index.php?action=delete&id=<?=$player->id;?>">Poista</a><br>
<?php
}

if(isset($message)) echo $message;

include "/partials/end.php";
?>