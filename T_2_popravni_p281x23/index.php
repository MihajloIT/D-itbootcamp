<?php

$tim = [
    ['Ime i prezime' => 'Jovan Jovanovic','dat_rodj' => '1992/05/10', 'Visina' => 196],
    ['Ime i prezime' => 'Pera Peric','dat_rodj' => '2000/11/10', 'Visina' => 201],
    ['Ime i prezime' => 'Mitar Miric','dat_rodj' => '1996/05/10', 'Visina' => 188],
    ['Ime i prezime' => 'Zarko Zarkovic','dat_rodj' => '1992/06/12', 'Visina' => 177],
    ['Ime i prezime' => 'Panta Pantic','dat_rodj' => '1977/05/12', 'Visina' => 210],    
    ['Ime i prezime' => 'Laza Kostic','dat_rodj' => '1982/05/12', 'Visina' => 215],
];

function prosecnaVisina($tim){

    $sum = 0;
    $brojac = 0;
    for($i=0; $i<count($tim);$i++)
    {       
            $sum += $tim[$i]['Visina'];
            $brojac++;          
    }
    $rez = $sum / $brojac;
    return $rez;
}


echo "Prosecna visina tima je : " .prosecnaVisina($tim);

function imeNajbliziProsek($tim, $boja)
{
    $max = 100000;
    $ime = "";
    for($i=0;$i<count($tim);$i++)
    {
        if(abs(prosecnaVisina($tim)-$tim[$i]['Visina'])<$max)
        {
            $max = abs(prosecnaVisina($tim)-$tim[$i]['Visina']);
            $ime = $tim[$i]['Ime i prezime'];

        }
    }
    echo "<p style='color: $boja'>$ime je po visini najblizi prosecnoj visini tima.</p>";
}

$boja = 'green';
imeNajbliziProsek($tim,$boja);


function razlika($tim, $godina)
{
    $max = 0;
    $min = 10000;
    for($i=0;$i<count($tim);$i++)
    {
        if(strtotime($tim[$i]['dat_rodj'])> strtotime($godina))
        {           
            if($tim[$i]['Visina'] > $max)
            {
                $max = $tim[$i]['Visina'];
            }
            if($tim[$i]['Visina'] < $min)
            {
                $min = $tim[$i]['Visina'];
            }
        }
    }
    $rez = $max - $min;
    
    return $rez;
}

$godina = "1981/01/01";
echo "<p>Razlika imedju igraca u visini posle zadate godine je : ".razlika($tim,$godina) ."</p>";











?>