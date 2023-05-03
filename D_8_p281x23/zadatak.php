<?php

// ZADATAK BROJ 1

// WHILE PETLJA
$n = $i= 3;
$m = 16;
$sum_proizvod = 1;
$sum_zbir = 0;
while($i <= $m){
    if($i%7 == 0 && $i%3 != 0){
        $sum_proizvod *= $i;
    }
    if($i%3 == 0 && $i%7 != 0){
        $sum_zbir += $i;
    }
    $i++;
}
$sum = $sum_proizvod - $sum_zbir;

echo "Razlika proizvoda brojeva i zbira brojeva, sa datim uslovom, od $n do $m je : $sum "; 
echo "<hr>";

// FOR PETLJA

$n = 1;
$m = 21;
$sum_proizvod = 1;
$sum_zbir = 0;
for($i=$n; $i <= $m; $i++){
    if($i%7 == 0 && $i%3 != 0){
        $sum_proizvod *= $i;
    }
    if($i%3 == 0 && $i%7 != 0){
        $sum_zbir += $i;
    }
    
}
$sum = $sum_proizvod - $sum_zbir;

echo "Razlika proizvoda brojeva i zbira brojeva, sa datim uslovom, od $n do $m je : $sum "; 
echo "<hr>";

// ZADATAK BROJ 2

// WHILE PETLJA
$n = $i = 2;
$m = 11;
$sum = 0;
while($i<= $m){
    if($i%2 != 0){
        $sum += $i**3;
    }
    
    $i++;
}
echo "Suma kubova neparnih brojeva od $n do $m je : $sum";
echo "<hr>";

// FOR PETLJA
$n = 1;
$m = 11;
$sum = 0;
for($i=$n;$i<= $m;$i++){
    if($i%2 != 0){
        $sum += $i**3;
    }
}
echo "Suma kubova neparnih brojeva od $n do $m je : $sum";
echo "<hr>";

// ZADATAK BROJ 3
$filmovi = array('Apokalipsa danas','Nesrecnici','Keri','Sludjeni i izgubljeni','Dobar, los, zao');
$reziseri = array('Kopola','Richi','de Palma', 'Linklejter','Leone');
$slike = array('slike/slika1.jpg','slike/slika2.jpg','slike/slika3.jpg','slike/slika4.jpg','slike/slika5.jpg');
$i = 0;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php $i=0; while($i <= count($filmovi)-1){ ?>
    <table>
        <tr>
            <td>
            <h3><?php echo $filmovi[$i]; ?></h3>
            <p><?php echo $reziseri[$i];?></p>
            </td>
            <td <?php if($i%2 != 0){echo "class='parni'";}else{echo "class='neparni'";}  ?>>
                <img src='<?php  echo $slike[$i]; ?>'>
            </td>
        </tr>
        
    </table>
    <?php $i++;}?>
</body>
</html>