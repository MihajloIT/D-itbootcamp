<?php
require_once "student.php";

class SamofinansirajuciStudent extends Student
{
    private $prijavljeniESPB;

    public function __construct($i,$bodovi,$po,$prijavljeniESPB)
    {
        if(is_string($i) && $bodovi >= 0 && is_numeric($po) && is_numeric($prijavljeniESPB))
        {
            parent::__construct($i,$bodovi,$po);
            $this->setPrijavljeniESPB($prijavljeniESPB) ;
        }
    }

    public function setPrijavljeniESPB($prBodovi)
    {
        
        if($prBodovi >= 35 && $prBodovi <= 60 && ($this->getosvojeniESPB()+$prBodovi) <= 300)
        {
            $this->prijavljeniESPB = $prBodovi;
        }
        elseif($this->getosvojeniESPB()> 265 && $this->getosvojeniESPB()<=300 && $prBodovi == (300 - $this->getosvojeniESPB()))
        {
            $this -> prijavljeniESPB = 300 - $this->getosvojeniESPB();
        }
        else
        {        
            echo "<p style='color:red'>{$this->getIme()} ne mozete prijaviti vise od 60 espb manje od 35 i ukupno ne vise od 300 ESPB</p>";
        }
    }
    public function getPrijavljeniESPB()
    {
        return $this->prijavljeniESPB;
    }

    public function skolarina()
    {
        if($this->getProsOcena()<8)
        {
            $skolarina = 1900 * $this->prijavljeniESPB;
        }else
        {
            $skolarina = 1600 * $this->prijavljeniESPB;
        }
        return $skolarina;
    }
    public function cenaPrijaveIspita()
    {
        return 400;
    }

}



































?>