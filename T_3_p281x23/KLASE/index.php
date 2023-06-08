<?php 

require_once "zbirka_zadataka.php";
require_once "udzbenik.php";

$u = new Udzbenik('Bela Griva' , 300, 500,2000);

$u -> stampa();

echo "<p>Jedinicna cena {$u ->getNaslov()} je " . $u->jedinicnaCena() . "</p>";


$zbirka = new ZbirkaZadataka('Matematika 3',500,5000,1500);

$zbirka -> stampa();

echo "<p>Jedinicna cena {$zbirka ->getNaslov()} je " . $zbirka->jedinicnaCena() . "</p>";



















?>