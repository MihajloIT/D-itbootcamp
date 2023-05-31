<?php


abstract Class Student
{
    protected $ime;
    protected $osvojeniESPB;
    protected $prosecnaOcena;


    public function __construct($i,$bodovi,$po)
    {
        if(is_string($i) && $bodovi >= 0 && is_numeric($po))
        {
            $this -> ime = $i;
            $this -> osvojeniESPB = $bodovi;
            $this -> prosecnaOcena = $po;
        }
    }

    public function setIme($i)
    {
        $this->ime = (is_string($i))? $i : "Pogresno uneto polje";
    }
    public function setosvojeniESPB($bodovi)
    {
        $this -> osvojeniESPB = ($bodovi >= 0)? $bodovi : "Ne moze biti negativna vrednost";
    }
    public function setProsOcena($po)
    {
        $this -> prosecnaOcena = (is_numeric($po))?$po:"Niste uneli broj!";
    }
    public function getIme()
    {
        return $this->ime;
    }
    public function getosvojeniESPB()
    {
        return $this -> osvojeniESPB;
    }
    public function getProsOcena()
    {
        return $this -> prosecnaOcena;
    }

    public function ispis()
    {
        echo "<p>Student {$this->getIme()}, br bodova {$this->getosvojeniESPB()}, ima prosecnu ocenu {$this->getProsOcena()}.</p>";
    }

    abstract public function skolarina();
    abstract public function cenaPrijaveIspita();


}





















?>