<?php

require_once "student.php";

class BudzetskiStudent extends Student
{
    public function skolarina()
    {
        $skolarina = (300-$this->getosvojeniESPB())*2000;
        return $skolarina;
    }
    public function cenaPrijaveIspita()
    {
        if($this->getosvojeniESPB() == 60 || $this->getosvojeniESPB() == 120 || $this->getosvojeniESPB() == 180 || $this->getosvojeniESPB() == 240 )
        {
            return 0;
        }else
        {
            return 100;
        }
    }

}


























?>