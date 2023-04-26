<?php 

// Zadatak br 1 :

echo "<hr>";

$i = $n = 23; 
$sum = 0;
while($i > 0.09){
    $broj1 = $i;
    $broj2 = floor($i);
    $i = floor($i);
    $decimale = abs($broj1-$broj2);
    $sum += $decimale;

    
    $i = $i/10;
}

$sum = $sum * 10;
if($sum == $n ){

    echo "<p style='border: solid orange 2px'>Zbir cifara broja $n je : $sum </p>";
}else{echo "<p style='border: solid blue 2px'>Zbir cifara broja $n je : $sum </p>";}

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