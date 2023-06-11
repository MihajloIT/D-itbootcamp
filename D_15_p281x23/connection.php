<?php

$server = "localhost";
$username = "admin";
$password = "admin123";
$db = "videoteka";

$connection = new mysqli($server,$username,$password,$db);

if($connection -> connect_error)
{
    die("Error connection to database " . $connection->connect_error);
}
// else{
//     echo "Uspesna konekcija";
// }






















?>