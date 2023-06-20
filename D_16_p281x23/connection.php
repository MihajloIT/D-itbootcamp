<?php


$server = "localhost";
$username = "theneverovatan";
$password = "mihajlo";
$db = "network";


$connection = new mysqli($server,$username,$password,$db);

if(!$connection)
{
    echo "Error connection" . $connection->error;
}













?>