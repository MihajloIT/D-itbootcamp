<?php

//Dat je niz stabala sa njihovim visinama (visina ne mora nužno biti ceo broj). Na nekoj
//visini od nivoa tla pušta se testera koja prolazi kroz redom kroz sva stabla u nizu.

$stabla = array(15,25,13,7,11,15,25,13,55,66);

function brojNeposecenihStabala($stabla,$testera){
    $brojac = 0;
    foreach($stabla as $key => $value){
        if($value < $testera){
            $brojac++;
        }
    }
    return $brojac;
}

$visinaTestere = 14;
$rez = brojNeposecenihStabala($stabla,$visinaTestere);
echo "<p>Broj stavala koja nisu posecena je $rez</p>";

//Napisati funkciju ukupnoPoseceno($stabla, $testera) kojoj
//se prosleđuje niz sa visinama stabala, kao i visina na kojoj se pušta testera da
//seče, a vraća koliko metara drva je ukupno posečeno.

function ukupnoPoseceno($x,$y){
    $sum = 0;
    $nizSaVisinama = array();
    foreach($x as $key => $value){

        if($value >= $y){
            $sum = $sum + ($value-$y);
            
        }
    }
    return $sum;
}

$visinaTestere = 14;
$rez = ukupnoPoseceno($stabla,$visinaTestere);
echo "Suma posecenih metara je $rez";

// Napisati funkciju maxDuzina($stabla, $testera) kojoj se prosleđuje niz sa visinama stabala, kao i visina na kojoj se pušta testera da seče,
// a vraća dužinu maksimalnog niza uzastopno posečenih stabala.


function maxDuzina($stabla, $testera){
    $duzinaNiza = array();
    foreach($stabla as $key=>$value){
        if($testera <= $value){
            $duzinaNiza[]=$value;
        }else{
            $duzinaNiza[] = 0 ;
        }
    }
    $maxNiz = array();
    $brojac = 0;
    foreach($duzinaNiza as $key => $value){
        if($value != 0){
            $brojac++;
        }else{
            $brojac = 0;
            $maxNiz[] = $brojac;
        }
        
    }
    
   
    return $maxNiz;
}

$testera = 15;
$rez = maxDuzina($stabla,$testera);
print_r($rez);



$y = 12;
$rez = maxDuzina($stabla, $y);
$brojac = 0;
$brojNizova = array();
    foreach($rez as $key=>$value){
        if($value != 0){
            $brojac++;
        }else{
            $brojNizova[] = $brojac;
            $brojac = 0;
        }
    }
    
$max = 0;
    foreach($brojNizova as $key => $value){
        if($value > $max){
            $max = $value;
        }
    }
echo "<p>Najveci niz je $max</p>";








//Zadatak 2 (Pijaca)

$cena = array('jabuke' => 150 , 'Kruske' => 120 , 'Jagode' => 300 , 'Maline' =>250);
$kolicina = array('jabuke' => 150 , 'Kruske' => 0 , 'Jagode' => 25 , 'Maline' => 0);

//Napisti funkciju stanje($cena, $kolicina) kojoj je
//prosleđuju dva asocijativna niza po uslovu zadatka, a koja tekstom zelene
//boje ispisuje imena voća kojih ima na stanju. Ukoliko voća nema na stanju,
//iste informacije ispisati tekstom crvene boje.

function stanje($cena,$kolicina){
    foreach($kolicina as $key => $value){

        if($value > 0){
            echo "<p style='color:green'>Voce $key ima na stanju</p>";
        }else{
            echo "<p style='color:red'>Voce $key nema na stanju</p>";
        }
    }
}

stanje($cena,$kolicina);

//Vlasnici tezge žele da prvo ponude ono voće čija je ukupna
//vrednost maksimalna (ukupna vrednost nekog voća računa se kao proizvod
//njegove količine i cene po kilogramu).
//Napisati funkciju prvoPonudi($cena, $kolicina) kojoj je prosleđuju
//dva asocijativna niza po uslovu zadatka, a koja vraća naziv voća sa
//maksimalnom vrednošću. Ukoliko ima više takvih voća, vratiti bilo koje.

function prvoPonudi($x,$y){
    $price = array();
    $kg = array();
    foreach($x as $value){
        $price[] = $value;
    }
    foreach($y as $value){
        $kg[] = $value;
    }
    $sum = array();
    for($i=0;$i<count($price);$i++){
        $sum[] = $price[$i]*$kg[$i];
        
    }
   
    return $sum;
}

prvoPonudi($cena,$kolicina);



?>