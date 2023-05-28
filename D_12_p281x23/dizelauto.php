<?php
   require_once "automobil.php";

class DizelAuto extends Automobil
{
    public $cenaDizela;

    public function __construct($n,$tg,$km,$pot,$cd)
    {
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




$d1 = new DizelAuto("Ford","DIZEL", 123456 , 3.9, 201);
$d2 = new DizelAuto("Ferrari","DIZEL", 7500 , 12.6, 201);
$d3 = new DizelAuto("Toyota","DIZEL", 177600 , 77.8, 201);
$d4 = new DizelAuto("Lada","DIZEL", 203000 , 1, 201);

$dizelasi = [$d1,$d2,$d3,$d4];















?>