<?php


namespace TUDublin;

class Student {

    const MAX_GPA = 4;
    private $id = -1;
    private $gpa;

    public function getID()
    {
        return $this->id;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getGPA()
    {
        return $this->gpa;
    }

    public function setGPA($gpa)
    {
        if($gpa < 0 || $gpa > self::MAX_GPA) {
            $this->gpa = 0;
        }
        else {
            $this->gpa = $gpa;
        }
    }

}