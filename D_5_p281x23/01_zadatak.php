<?php

$farenhajt = 16;
$celzius = ($farenhajt - 32)*(5/9);
$kelvin = $celzius + 273.15;
$kelvin = number_format($kelvin , 2, "," , ".");

echo "<hr>";
echo " $farenhajt Farenhajta je $kelvin Kelvina ";
echo "<hr>";

$kelvin = 101;
$celzijus = $kelvin - 273.15;
$farenhajt = $celzijus * 9/5 + 32;

echo "<hr>";
echo "$kelvin Kelvina je $farenhajt Farenhajta. ";
echo "<hr>";


?>