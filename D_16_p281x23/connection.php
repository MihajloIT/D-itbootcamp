<?php
mysqli_report(MYSQLI_REPORT_OFF); // ovo se stavi da bi ovo header radilo u ovoj php 8.2 verziji 
$server = "localhost";
$username = "theneverovatan";
$password = "mihajlo";
$db = "network";

$connection = new mysqli($server,$username,$password,$db);

if($connection -> connect_error)
{
    //ovo je elegantno resernje
    //header("Location: error.php?m=". $connection->connect_error); 
    die("Neuspela konekcija : " . $connection->connect_error);
}
$connection ->set_charset("utf8"); // utf 32 je prosirenje utf8 a to se odnosi na kolicinu bajta koji cuva za specificne simbole , kao utf8 sadrzi dovoljno tog sto treba




// if(!$connection)
// {
//     echo "<p>Greska u konekciji :". $connection->connect_error ."</p>";
// }else
// {
//     echo "Connected";
// }


















?>