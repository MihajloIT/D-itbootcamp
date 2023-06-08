<?php

require_once "knjiga.php";

class ZbirkaZadataka extends Knjiga
{
    private $broj_zadataka;

    public function __construct($n,$br_s,$c,$br_z)
    {
        if(is_numeric($br_z) && $br_z > 0)
        {
        parent::__construct($n,$br_s,$c);
        $this -> broj_zadataka = $br_z;
        }else
        {
            echo "<p>Lose postavljena zbirka zadataka !</p>";
        }
    }

    public function setBrojZadataka($br_z)
    {
        if(is_numeric($br_z) && $br_z >0)
        {
            $this -> broj_zadataka = $br_z;
        }
    }
    public function getBrojZadataka()
    {
        return $this -> broj_zadataka;
    }

    public function stampa()
    {
        echo "<p>Naslov: ". $this->getNaslov() . " br strana " .$this->getBrojStrana(). " cena " . $this->getCena(). " broj zadataka ". $this -> getBrojZadataka() ."</p>";
    }

    public function jedinicnaCena()
    {
        $prosecna_cena_jednog_zadatka = ($this->getBrojZadataka()/$this->getBrojStrana())/$this->getCena();
        return $prosecna_cena_jednog_zadatka;
    }
}


























?>