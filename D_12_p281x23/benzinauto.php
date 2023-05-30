<?php    
    require_once "automobil.php";

class BenzinAuto extends Automobil
{
    public $cenaBenzina;

    public function __construct($n,$km,$pot,$cb)
    {
        $tg = "BENZIN";
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


