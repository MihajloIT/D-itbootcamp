<?php    
    require_once "automobil.php";

class BenzinAuto extends Automobil
{
    public $cenaBenzina;

    public function __construct($n,$tg,$km,$pot,$cb)
    {
        parent::__construct($n,$tg,$km,$pot);
        $this->setCenaBenzina($cb);

    }
    public function setCenaBenzina($cb)
    {
        if(is_numeric($cb))
        {
            $this -> cenaBenzina = $cb;
        }
    }

    public function getCenaBenzina()
    {
        return $this->cenaBenzina;
    }
    public function ulozenoPara()
    {
        $rez = ($this->getPredjenoKilometara()/100)*$this->getPotrosnja()*$this->getCenaBenzina();
        return $rez;
    }
}    


$b1 = new BenzinAuto("Ford","BENZIN",26000,33,176);
$b2 = new BenzinAuto("Ferrari","BENZIN",15000,17,176);
$b3 = new BenzinAuto("Toyota","BENZIN",76000,7,176);
$b4 = new BenzinAuto("Lada","BENZIN",160000,1,176);

$d1 = new DizelAuto("Opel","DIZEL", 123456 , 3.9, 201);
$d2 = new DizelAuto("Fiat","DIZEL", 7500 , 12.6, 201);
$d3 = new DizelAuto("Peglica","DIZEL", 177600 , 77.8, 201);
$d4 = new DizelAuto("Trabant","DIZEL", 203000 , 11, 201);

$benzinciidizeli = [$b1,$b2,$b3,$b4,$d1,$d2,$d3,$d4];

maksUlozeno($benzinciidizeli);

















?>