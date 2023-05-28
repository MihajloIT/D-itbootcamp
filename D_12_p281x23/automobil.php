<?php
require_once "dizelauto.php";
require_once "benzinauto.php";

class Automobil
{
    protected $naziv;
    protected $tipGoriva;
    protected $predjenoKilometara;
    protected $potrosnja;

    public function __construct($n,$tg,$km,$pot)
    {
        $this -> setNaziv($n);
        $this -> setTipGoriva($tg);
        $this -> setPredjenoKilometara($km);
        $this -> setPotrosnja($pot);
    }

    /// SETERI
    public function setNaziv($n)
    {
        if(is_string($n))
        {
            $this-> naziv = $n;
        }else
        {
            echo "<p>Pogresno ste uneli naziv</p>";
        }
    }
    public function setTipGoriva($tg)
    {
        $tipovi = ['DIZEL','BENZIN'];
        if(in_array($tg,$tipovi))
        {
            $this -> tipGoriva = $tg;
        }else
        {
            echo "<p>Uneli ste pogresan tip goriva</p>";
        }
    }
    public function setPredjenoKilometara($km)
    {
        if(is_numeric($km))
        {
            $this -> predjenoKilometara = $km;
        }
    }
    public function setPotrosnja($pot)
    {
        if(is_numeric($pot))
        {
            $this -> potrosnja = $pot;
        }
    }
    //// GETERI
    public function getNaziv()
    {
        
        return $this-> naziv;
        
    }
    public function getTipGoriva()
    {
        
        return $this -> tipGoriva;
        
    }
    public function getPredjenoKilometara()
    {
        return $this -> predjenoKilometara;
    }
    public function getPotrosnja()
    {
        
        return $this -> potrosnja;
    }

    public function ispis()
    {
        echo "<p>Automobil marke {$this->getNaziv()}, tip: {$this->getTipGoriva()}, preso: {$this->getPredjenoKilometara()}, trosi: {$this->getPotrosnja()} litara</p>";
    }

}

function maksUlozeno($niz)
    {
        $max = 0;
        $cuvar = 0;
        for($i=0;$i<count($niz);$i++)
        {
            if($niz[$i]->ulozenoPara()>$max)
            {
              $max=$niz[$i]->ulozenoPara(); 
              $cuvar = $i; 
            }
        }
        echo "<p>Automobil iz niza u koji je ulozeno najvise para je:  {$niz[$cuvar]->getNaziv()}, tip: {$niz[$cuvar]->getTipGoriva()}, preso: {$niz[$cuvar]->getPredjenoKilometara()}, trosi: {$niz[$cuvar]->getPotrosnja()} litara, ukupno ulozeno {$niz[$cuvar]->ulozenoPara()} dinara</p>";
    }

function boljiTip($niz)
{
    $min_potrosnja = 10000;
    $cuvar = 0;
    foreach($niz as $key => $value)
    {
       
        if(isset($value->cenaBenzina)){
            if($value->getPotrosnja()*$value->getCenaBenzina() < $min_potrosnja)
            {
                $min_potrosnja = $value->getPotrosnja()*$value->getCenaBenzina();
                $cuvar = $key; 
                              
            }
        }else
        {
            if($value->getPotrosnja()*$value->getCenaDizela() < $min_potrosnja)
            {
                $min_potrosnja = $value->getPotrosnja()*$value->getCenaDizela();
                $cuvar = $key;
            }
        }        
    }
    return $niz[$cuvar];
}

maksUlozeno($benzinciidizeli);

echo "<hr>";
echo "Auto sa najmanjom potrosnjom/cena je : "  ;
echo boljiTip($benzinciidizeli)->ispis();
echo "<hr>";


















?>