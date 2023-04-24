<?php

    //zadatak 1



$dan = date("N");
echo "$dan" . "<br>";
$sat=date("H");
echo $sat. "<br>";

if($dan <6){
    if($sat>9 && $sat<20){
        echo "radimo" . "<br>";
    }else{ echo "ne radimo";
    }
}else{
    if($sat >10 &&$sat<17){
        echo "radimo";
    }else{echo "ne radimo";
    }
}
echo "<hr>";
//2. zadatak

$brstanovnika = 10000;
$testiranidan= 3000;
$zarazenidan = 901;
$pozukup = ($zarazenidan/$brstanovnika);
$dankrozsum = ($zarazenidan/$testiranidan);
echo $pozukup . "<br>" . $dankrozsum . "<br>";
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
