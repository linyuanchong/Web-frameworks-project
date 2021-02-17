<?php

//This class contains all methods to be ran.


namespace TUDublin;

//"use" command.
use TUDublin\Person;

class Application
{
    public function run() {

        //Create new Person via namespace TUDublin.
        //$person1 = new \TUDublin\Person("Linyuan");

        //Direct create as TUDublin\Person already "use"d. (line 7)
        $person1 = new Person("Linyuan");

        print '_______';
        //"\n" in PHP.
        print PHP_EOL;
        print 'Name of $person1 = ' . $person1->getName() . '.';
        print PHP_EOL;
        print '_______';
        print PHP_EOL;
    }
}