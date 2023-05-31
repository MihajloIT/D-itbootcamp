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
        }else{
            echo "<p style='color:red'>{$this->getIme()} ne mozete prijaviti vise od 60 espb</p>";
        }
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