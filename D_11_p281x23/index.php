<?php

class Autobus
{
    private $rgBroj;
    private $brSedista;

    public function __construct($r,$s)
    {
        $this -> setRgBroj($r);
        $this -> setBrSedista($s);
    }
    // seteri
    public function setRgBroj($r)
    {
        $this -> rgBroj = $r;
    }
    public function setBrSedista($s)
    {
        $this -> brSedista = $s;
    }
    /////////////////
    // geteri
    public function getRgBroj()
    {
        return $this -> rgBroj;
    }
    public function getBrSedista()
    {
        return $this -> brSedista;
    }
////////////
    public function podaciAutobusa()
    {
        echo "<p>Autobus registarskih oznaka ". $this->rgBroj ." ima ". $this->brSedista ."sedista.</p>";
    }   

}
$busevi = array
(
    ['rgbroj'=>'NS123CC','brsedista'=>78],
    ['rgbroj'=>'KG321BD','brsedista'=>34],
    ['rgbroj'=>'VL888TE','brsedista'=>155]
);
function ukupnoSedista($niz)
    {
        $sum_br_sed = 0;
        for($i=0;$i<count($niz);$i++)
        {
            $sum_br_sed += $niz[$i]['brsedista'];
        }
        return $sum_br_sed;
    }
function maksSedista($niz)
{
    $max = 0;
    $kljuc = 0;
    for($i=0;$i<count($niz);$i++)
    {
        if($niz[$i]['brsedista'] > $max)
        {
            $max = $niz[$i]['brsedista'];
            $kljuc = $i;
        }        
    }
    echo "<p>Max sedista ima autobus ". $niz[$kljuc]['rgbroj']." koji ima $max sedista.</p>";
}


function ljudi($niz,$brljudi)
{
    if(ukupnoSedista($niz) >= $brljudi)
    {
        return true;
    }else
    {
        return false;
    }
}





if(ljudi($busevi,1112))
{
    echo "<p>Ima mesta za sve</p>";
}else
{
    echo "<p>Nema mesta za sve</p>";
}


echo "Ukupan broj sedista je : ". ukupnoSedista($busevi);


$proba = new Autobus("VB123LL",'133');
$proba -> podaciAutobusa();





?>