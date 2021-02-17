<?php


namespace TUDublinTests;

use PHPUnit\Framework\TestCase;
use TUDublin\Student;

class StudentTest extends TestCase {

    public function testIfWorks() {
        //Arrange
        $s = new Student();

        //Act

        //Assert
        $this->assertEqual($s);
    }

}