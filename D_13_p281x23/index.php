<?php

require_once "student.php";
require_once "samofinansiranje.php";
require_once "budzet.php";


$s1 = new BudzetskiStudent("Dragan Milic",120,9.9);
$s2 = new SamofinansirajuciStudent("Zoran Radmilovic", 77,8,60);
$s3 = new SamofinansirajuciStudent("Jovana Jovanovic",98,7.1,36);
$s4 = new BudzetskiStudent("Pavle Pavlovic", 180,7);
$s5 = new SamofinansirajuciStudent("Petra Krajc", 35,6.4,55);
$s6 = new SamofinansirajuciStudent("Sofronije Trnavcevic", 35,6.4,60);
$s7 = new BudzetskiStudent("Dragana Mirkovic", 235,7);

$studenti = [$s1,$s2,$s3,$s4,$s5,$s6,$s7];

foreach($studenti as $student)
{
    echo "<p>Skolarina studenta {$student->getIme()} je {$student->skolarina()} .</p>";
}
echo "<hr>";

function maxSkolarina($niz)
{
    $max = 0;
    $cuvar = 0;
    foreach($niz as $key => $value)
    {
        if($value->skolarina() > $max)
        {
            $max = $value->skolarina();
            $cuvar = $key;
        }
    }
    return $niz[$cuvar]->getIme();
}

echo "<p>Student koji placa najvecu skolarinu je ". maxSkolarina($studenti)."</p>";


function prosecnaSkolarina($niz)
{
    $sum = 0;
    $brojac = 0;
    foreach($niz as $value)
    {
        $sum += $value -> skolarina();
        $brojac++;
    }
    $rez = $sum / $brojac;
    return $rez;
}
echo "<p>Prosecna skolarina je : ". prosecnaSkolarina($studenti)."</p>";

function prosecnoSkolarinaESPB($niz)
{
    $sum = 0;
    foreach($niz as $value)
    {
        if($value->getosvojeniESPB() !== 0)
        {
            $sum += $value -> skolarina()/$value->getosvojeniESPB();
        }
        
    }
    $rez = round($sum / count($niz),2);
    return $rez;
}
echo "<p>Prosecna odnos skolarine i ESPB je : ". prosecnoSkolarinaESPB($studenti)."</p>";


function studentMinESPB($niz)
{
    $min = 350;
    $max_skolarina = 0;
    $cuvar = 0;
    foreach($niz as $key => $value)
    {
        if($value->getosvojeniESPB() < $min)
        {
            $min = $value->getosvojeniESPB();
            $max_skolarina = $value->skolarina();
            $cuvar = $key;
        }elseif($value->getosvojeniESPB() == $min && $value->skolarina() > $max_skolarina)
        {            
            $max_skolarina = $value->skolarina();
            $cuvar = $key;
        }
    }
    return $niz[$cuvar]->getIme(); 
}

echo "<p>Student sa min ESPB i max skolarinom je : ". studentMinESPB($studenti)."</p>";


echo "<hr>";

foreach($studenti as $student)
{
    echo "<p>Prijava ispita za {$student->getIme()} je ". $student->cenaPrijaveIspita()."</p>";
}

echo "<hr>"; // Ispravka domaceg

$provera = new SamofinansirajuciStudent("Zoran",265,8,35);

echo $provera -> getprijavljeniESPB();






















?>