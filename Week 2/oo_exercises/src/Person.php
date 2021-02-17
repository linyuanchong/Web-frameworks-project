<?php
namespace TUDublin;


class Person
{
    private $name;

    //Right click->generate->constructor.
    public function __construct($name)
    {
        //Construct via setter.
        //Originally ($this->name = $name;)
        $this->setName($name);
    }

    //Right click->generate->constructor.
    //Getter for name.
    public function getName()
    {
        return $this->name;
    }
    //Setter for name.
    public function setName($name)
    {
        $this->name = $name;
    }
}