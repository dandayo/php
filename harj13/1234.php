<?php
require "index.php";

function getAllPlayers()
{
    global $pdo;
    $sql = "SELECT id,account_name FROM players";
    $stm = $pdo->query($sql); 
    
    $players = $stm->fetchAll(PDO::FETCH_CLASS);
    return $players;
}

function addPlayer($data)
{
    global $pdo;
    $sql = "INSERT INTO players(account_name,password,email,last_login,online,money,current_character,banned) VALUES (?,?,?,?,?,?,?,?)";

    $stm = $pdo->prepare($sql);
    $stm->execute($data);

    return $pdo->lastInsertId();
}

function deletePlayer($id)
{
    global $pdo;
    $sql = "DELETE FROM players WHERE id = ?";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $id);
    $stm->execute();
}

function getPlayerById($id) //hakee yhden pelaajan tiedot
{
    global $pdo;
    $sql = "SELECT * FROM players WHERE id = ?";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $id);
    $stm->execute();

    $player = $stm->fetchAll(PDO::FETCH_CLASS);
    return $player;
}

function editPlayer($data)
{
    global $pdo;
    $sql = "UPDATE players SET account_name = ?, email = ?, money = ?,current_character = ?,banned = ? WHERE id = ?";

    $stm = $pdo->prepare($sql);
    return $stm->execute($data);    
}