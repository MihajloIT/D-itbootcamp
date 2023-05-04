<?php 

// Zadatak br 1 :

echo "<hr>";

$n = $i = 555;
$sum = 0;
while($i >= 1){
    $str = (string)$i;
    $result = (int)$str[-1];
    $sum += $result;

    $i = floor($i/10); // uslov pomocu kog izbacujem zadnji broj i zaokruzujem vrednost
}


if($sum == $n ){

    echo "<p style='border: solid orange 2px'>Zbir cifara broja $n je : $sum </p>";
}else{echo "<p style='border: solid blue 2px'>Zbir cifara broja $n je : $sum </p>";}

echo "<hr>";


////////// DRUGI NACIN 1. ZADATKA 

$n = 5166;
$sum = 0;
// ubacujem abs($n) ako broj bude negativan
for($i=abs($n) ; $i >=1 ; $i=$i/10){
    $zadnja_cifra = $i%10;
    $sum += $zadnja_cifra;
    
}
if($sum == abs($n)){
    echo "Zbir cifara broja $n je : <strong style='border: dotted 2px orange'>$sum</strong>";
}else{ echo "Zbir cifara broja $n je : <strong style='border: dotted 2px blue'>$sum</strong>";}
echo "<hr>";

// Zadatak br 2 :

$broj = 21;
$i = 1;
$sum = 0;
while($i <= $broj){

    if($broj%$i == 0){
        
        if($i%3 == 0){

            if($i%2 != 0){
                $sum++;
                echo $i . " , " ;
                
                
            }
        }

    }
    $i++;
}

echo "su delioci broja $broj koji su deljivi sa 3, ima ih : $sum";

echo "<hr>";

// Zadatak br 3 :
$n = 65;
$k = $n-1;
$prost = true;
for($m = $k; $m > 1; $m--){

    if($n%$m == 0){

         $prost = false;
        break;
    }
}

if($prost == false){
    echo "Broj $n nije prost broj";
}
else{ echo "Broj $n je prost broj ";}
 
?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        body{
            background-color: grey;

        }
        
    </style>
</head>
<body>
    
</body>
</html>