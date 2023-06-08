<?php


abstract class Knjiga
{
    private $naslov;
    private $broj_strana;
    private $cena;


    public function __construct($n,$br_s,$c)
    {
        if(strlen($n)>0 && is_string($n) && $br_s > 0 && is_numeric($br_s) && $c > 0 && is_numeric($c))
        {
            $this -> naslov = $n;
            $this -> broj_strana = $br_s;
            $this -> cena = $c;
        }else
        {
            echo "<p>Lose ste kreirali objekat</p>";
        }
    }
    public function setNaslov($n)
    {
        if(strlen($n)>0 && is_string($n))
        {
            $this-> naslov = $n;
        }
    }
    public function setBrojStrana($br_s)
    {
        if($br_s > 0 && is_numeric($br_s))
        {
            $this -> broj_strana = $br_s;
        }
    }
    public function setCena($c)
    {
        if($c > 0 && is_numeric($c))
        {
            $this -> cena = $c;
        }
    }

    public function getNaslov()
    {
        return $this -> naslov;
    }
    public function getBrojStrana()
    {
       return $this -> broj_strana;
    }
    public function getCena()
    {
       return $this -> cena ;
    }

    public function stampa()
    {
        echo "<p>Naslov:". $this->getNaslov() . "br strana" .$this->getBrojStrana(). "cena" . $this->getCena(). "</p>";
    }

    public abstract function jedinicnaCena();
}


















?>