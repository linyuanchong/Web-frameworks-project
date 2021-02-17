<?php


namespace TUDublin;


class Student
{
    private $id;
    private $firstName;
    private $surName;
    private $phoneNumber;


    public function __construct($id, $firstName, $surName, $phoneNumber)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->surName = $surName;
        $this->phoneNumber = $phoneNumber;
    }

    //No setter for ID as ID is a constant information.
    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getSurName()
    {
        return $this->surName;
    }

    public function setSurName($surName)
    {
        $this->surName = $surName;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
}