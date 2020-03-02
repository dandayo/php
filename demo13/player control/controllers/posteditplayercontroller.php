<?php
require "./database/models/Player.php";
require "./helpers/helper.php";


if(isset($_POST["id"],$_POST["aname"],$_POST["email"],$_POST["character"],$_POST["money"])) {
    $id = $_POST["id"];
    $account_name = sanit($_POST["aname"]);
    $email = sanit($_POST["email"]);
    $current_character = sanit($_POST["character"]);
    $money = $_POST["money"];
        
    if(isset($_POST["banned"])) $banned = 1;
    else $banned = 0;

    $data = array($account_name,$email,$money,$current_character,$banned,$id);

    if(editPlayer($data)) {
        $players = getAllPlayers();
        $message = "Tiedot muutettu";
        require "./views/index.view.php";
    }
    else {
        $players = getAllPlayers();
        $message ="Muutos ei onnistunut";
        require "./views/index.view.php";
    }

}
else {
    $players = getAllPlayers();
    echo "Tietoja puuttuu";
    require "./views/index.view.php";
}