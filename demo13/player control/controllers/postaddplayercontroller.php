<?php
require "./helpers/helper.php";
require "./database/models/Player.php";

if(isset($_POST["aname"],$_POST["passwd"],$_POST["passwd2"],$_POST["email"],$_POST["character"]) && $_POST["passwd"] == $_POST["passwd2"]) {
    $name = sanit($_POST["aname"]);
    $passu = sanit($_POST["passwd"]);
    $email = sanit($_POST["email"]);
    $character = sanit($_POST["character"]);
    $last_login = date('Y-m-d');


    //(account_name,password,email,last_login,online,money,current_character,banned)

    $data = array($name,$passu,$email,$last_login,1,500,$character,0);
    //var_dump($data);
    $id = addPlayer($data);
    $message = "Lisätty uusi pelaaja, id on $id";
    //echo $id;
    $players = getAllPlayers();
    require "./views/index.view.php";
}
else {
    $message = "Tietoja puuttuu";
    require "./views/addplayerform.view.php";
}