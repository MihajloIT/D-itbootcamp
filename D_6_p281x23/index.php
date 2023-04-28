<?php

    //zadatak 1



// $dan = date("N");
// $sat=date("H");
// $min = date("i");
$dan= 7;
$sat = 10;
$min = 59;
echo "<br>";

if($dan <6){
    if($sat >= 9 && $min >= 0){
        if($sat <= 19 && $min <= 59){
            echo "SAD RADIMO";
        }else{ echo "SAD NE RADIMO";}
    }else{ echo "SAD NE RADIMO";}

}
else{
    if($sat >= 10 && $min >= 0){
        if($sat <= 17 && $min <= 59){
            echo "SAD RADIMO";
        }else{ echo "SAD NE RADIMO";}
    }else{ echo "SAD NE RADIMO";}
}
echo "<hr>";
//2. zadatak

$brstanovnika = 10000;
$testiranidan= 3000;
$zarazenidan = 901;
$pozukup = ($zarazenidan/$brstanovnika);
$dankrozsum = ($zarazenidan/$testiranidan);
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

<?php
if($pozukup > 0.1 || $dankrozsum > 0.3 ){
    echo "<p>VAnredno stanje..</p>";
}
?>
</body>
</html>
