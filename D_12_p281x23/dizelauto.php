<?php
   require_once "automobil.php";

class DizelAuto extends Automobil
{
    public $cenaDizela;

    public function __construct($n,$km,$pot,$cd)
    {
        $tg = "DIZEL";
        parent::__construct($n,$tg,$km,$pot);
        $this->setCenaDizela($cd);

    }
    public function setCenaDizela($cd)
    {
        if(is_numeric($cd))
        {
            $this -> cenaDizela = $cd;
        }
    }

    public function getCenaDizela()
    {
        return $this->cenaDizela;
    }
    public function ulozenoPara()
    {
        $rez = ($this->getPredjenoKilometara()/100)*$this->getPotrosnja()*$this->getCenaDizela();
        return $rez;
    }   
}    


















?>