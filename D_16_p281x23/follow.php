<?php

session_start();
require_once "connection.php";

if(empty($_SESSION['id']))
{
    header("Location: index.php");
    exit();
}
$id = $_SESSION['id'];


if(empty($_GET['friend_id']))
{
    header("Location: index.php");
}
$friendId = $connection->real_escape_string($_GET['friend_id']);

$q = "SELECT * FROM `followers`
      WHERE `id_sender` = $id
      AND `id_receiver` = $friendId ;";
$result = $connection -> query($q);
if($result->num_rows == 0)
{
    $upit = "INSERT INTO `followers`(`id_sender` , `id_receiver`)
             VALUES ($id, $friendId);";
    $result1 = $connection->query($upit);
}
header("Location: followers.php");


// Onaj koji salje zahtev : Logovani korisnik
// Onaj kome je zahtev upucen: Dohvatimo iz URL-a


















?>