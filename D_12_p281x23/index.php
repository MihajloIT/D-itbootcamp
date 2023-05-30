<?php
    require_once "automobil.php";
    require_once "benzinauto.php";
    require_once "dizelauto.php";


    $b1 = new BenzinAuto("Ford",26000,33,176);
    $b2 = new BenzinAuto("Ferrari", 15000,17,176);
    $b3 = new BenzinAuto("Toyota", 76000,7,176);
    $b4 = new BenzinAuto("Lada", 160000,19,176);
    
    $d1 = new DizelAuto("Opel", 123456 , 3.9, 201);
    $d2 = new DizelAuto("Fiat", 7500 , 12.6, 201);
    $d3 = new DizelAuto("Peglica", 177600 , 77.8, 201);
    $d4 = new DizelAuto("Trabant", 203000 , 11, 201);
    
    $benzinciidizeli = [$b1,$b2,$b3,$b4,$d1,$d2,$d3,$d4];
    
    maksUlozeno($benzinciidizeli);
    
    echo "<hr>";
    echo "Auto sa najmanjom potrosnjom/cena je : "  ;
    echo boljiTip($benzinciidizeli);
    echo "<hr>";


   













?>