<?php

class tekuciRacun
{
    private $BrojRacuna;
    private $Stanje;
    private $Kurs;

    /////////// SETERI//////////////
    public function setBrojRacuna($br)
    {
        if(strlen($br)!=18 || $br[0] == 0)
        {
            echo "<p>Pogresno ste uneli br racuna, mora tacno 18 cifara i prva cifra ne sme biti 0 !</p>";
        }
        else
        {
            $this -> BrojRacuna = $br;
        }        
    }
    public function setStanje($st)
    {      
        $st = round($st,2);  
        $this -> Stanje = $st;
    }
    public function setKurs($kurs)
    {   
        $kurs = round($kurs, 4);
        $this -> Kurs = $kurs;
    }
    ////////// END SETERI  /////////

    ////////// GETERI ////////////
    public function getBrojRacuna()
    {
        return $this -> BrojRacuna;
    }
    public function getStanje()
    {        
        return round($this -> Stanje,2);
               
    }
    public function getKurs()
    {   
        return $this ->Kurs;
    }
    //////// END GETERI   ////////////////

    function uplati($iznos,$valuta)
    {        
        $iznos = round($iznos,2);
        if($iznos >=0){
            if($valuta === "RSD")
            {
                $this->Stanje = $this->getStanje() + $iznos;
                $this->stanje();              
            }
            elseif($valuta === "EUR")
            {
                $this->Stanje = $this->getStanje() + ($iznos*$this -> getKurs());
                $this->stanje();              
            }
            else
            {
                echo "<h4>Pogresno ste uneli valutu, pokusajte ponovo</h4>";
            }
        }
        else
        {
            echo "<h4>Uneli ste negativnu vrednost !</h4>";
        }
    }

    function isplata($iznos,$valuta)
    {     
        $iznos = round($iznos,2);   
        if($iznos < 0)
        {
            echo "<p>Vrednost ne moze biti negativna</p>";
             return false;
        }
        if($valuta === "RSD"){
            if(($this->getStanje()-$iznos)>=0)
            {
                $this->setStanje(($this->getStanje())-$iznos);
                return true;
            }            
            else
            {
                return false;
            }
        }
        elseif($valuta === "EUR")
        {
            if($this->getStanje() - ($iznos * $this->getKurs())>=0)
            {
                $this->setStanje(($this->getStanje())-($iznos * $this->getKurs()));
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            echo "<h4>Uneli ste neispravnu valutu !</h4>";
        }
    }

    function stanje()
    {
        $dan = date('d/m/Y');
        echo "<p>Stanje na racunu broj : " . $this->getBrojRacuna(). " na dan $dan je ". $this-> getStanje(). " RSD.</p>";
    }
     
}

$tr1 = new tekuciRacun();
$tr1 -> setBrojRacuna("223444456565777713");    
$tr1 -> setStanje(117.3); 
$tr1 -> setKurs(117.3);   

$tr2 = new tekuciRacun();
$tr2 -> setBrojRacuna("122244445555666612");  
$tr2 -> setStanje(225.45345345); 
$tr2 -> setKurs(117.3);  

$tr3 = new tekuciRacun();
$tr3 -> setBrojRacuna("123456788765432112");        
$tr3 -> setStanje(-1000.000011212); 
$tr3 -> setKurs(117.3);  

//// ispitivanje racuna tr1
   echo "<h3>Racun broj 1</h3>";
echo $tr1->getStanje(); // pocetno stanje
$tr1->uplati(0,"EUR"); // prva promena na racunu tr1
if($tr1->isplata(1,"EUR"))
{
    echo "TRUE";
}
else
{
    echo "FALSE";
}
echo "<br>";
echo $tr1->getStanje();
echo "<hr>";



/// ispitivanje racuna tr2
echo "<h3>Racun broj 2</h3>";
echo $tr2->getStanje(); // pocetno stanje
$tr2->uplati(-10000,"RSD"); // prva promena na racunu tr1
if($tr2->isplata(100,"RSD"))
{
    echo "TRUE";
}
else
{
    echo "FALSE";
}
echo "<hr>";



/// ispitivanje racuna tr3
echo "<h3>Racun broj 3</h3>";
echo $tr3->getStanje(); // pocetno stanje
$tr3->uplati(560,"EUR"); // prva promena na racunu tr1
$tr3->uplati(560,"HR"); // pokusaj uplate u KUNAMA
if($tr3->isplata(100000,"RSD"))
{
    echo "TRUE";
}
else
{
    echo "FALSE";
}
echo "<hr>";


// testiranje isplate, status : sve radi !
// if($tr3->isplata(22220,"EUR"))
// {
//     echo "TRUE";
// }
// else
// {
//     echo "FALSE";
// }



?>



