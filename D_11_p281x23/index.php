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

$b1 = new Autobus("NS123CC","178");
$b2 = new Autobus("KG321BD","35");
$b3 = new Autobus("VL888TE","155");

$busevi = [$b1,$b2,$b3];

function ukupnoSedista($niz)
    {
        $sum_br_sed = 0;
        for($i=0;$i<count($niz);$i++)
        {
            $sum_br_sed += $niz[$i]->getBrSedista();
        }
        return $sum_br_sed;
    }
function maksSedista($niz)
{
    $max = 0;
    $kljuc = 0;
    for($i=0;$i<count($niz);$i++)
    {
        if($niz[$i]->getBrSedista() > $max)
        {
            $max = $niz[$i]->getBrSedista();
            $kljuc = $i;
        }        
    }
    echo "<p>Max sedista ima autobus ". $niz[$kljuc]->getRgBroj()." koji ima $max sedista.</p>";
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





if(ljudi($busevi,368))
{
    echo "<p>Ima mesta za sve</p>";
}else
{
    echo "<p>Nema mesta za sve</p>";
}


echo "Ukupan broj sedista je : ". ukupnoSedista($busevi);


$proba = new Autobus("VB123LL",'133');
$proba -> podaciAutobusa();

maksSedista($busevi);



?>