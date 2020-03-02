<?php

require "connection.php";
require "helper.php";

if(isset($_POST["otsikko"],$_POST["sisalto"],$_POST["kirjoituspvm"],$_POST["poistamispvm"],$_POST["kirjoittaja"])) {
    $otsikko = sanit($_POST["otsikko"]);
    $sisalto = sanit($_POST["sisalto"]);
    $kirjoituspvm = date("kirjoituspvm");
    $poistamispvm = date("poistamispvm");
    $kirjoittaja = sanit($_POST["kirjoittaja"]);

    $sql = "UPDATE uutinen SET otsikko = ?, sisalto = ?,kirjoituspvm = ?,poistamispvm = ?,kirjoittaja = ? WHERE id = ?";

    $stm = $pdo->prepare($sql);

    $stm->execute(array($otsikko,$sisalto,$kirjoituspvm,$poistamispvm,$kirjoittaja));
    header("Location: index.php?message=puuttuu");
}