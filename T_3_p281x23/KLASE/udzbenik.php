<?php

require_once "knjiga.php";

class Udzbenik extends Knjiga
{
    private $tiraz;


    public function __construct($n,$br_s,$c,$tir)
    {
        if(is_numeric($tir) && $tir > 0)
        {
        parent::__construct($n,$br_s,$c);
        $this -> tiraz = $tir;

        }else
        {
            echo "<p>Lose postavljena udzbenik !</p>";
        }
    }

    public function setTiraz($tir)
    {
        if(is_numeric($tir) && $tir > 0)
        {
            $this -> tiraz = $tir;
        }
    }
    public function getTiraz()
    {
        return $this -> tiraz;
    }

    public function stampa()
    {
        echo "<p>Naslov: ". $this->getNaslov() . " br strana " .$this->getBrojStrana(). ", cena " . $this->getCena(). ", tiraz je ". $this -> getTiraz() ."</p>";
    }

    public function jedinicnaCena()
    {
        $jedinicna_cena = $this -> getCena() / $this -> getTiraz();
        return $jedinicna_cena;
    }
}





























?>