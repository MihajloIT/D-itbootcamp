<?php
require_once "connection.php";

$upit = "ALTER TABLE `profiles`
         ADD  `bio` TEXT;";

$q = $connection->query($upit);

if($q)
{
    echo "Uspesno kreirana kolone";
}else
{
    echo "Doslo je do greske kreiranja colone 'bio'";
}









?>