<?php


namespace TUDublinTests;

use PHPUnit\Framework\TestCase;
use TUDublin\Student;

class StudentTest extends TestCase
{
    public function testNewStudentObjectNotNull()
    {
        //Arrange.
        $s = new Student();

        //Act.

        //Assert.
        $this->assertNotNull($s);
    }

    public function testGetIDReturnsNonNullForNewStudent()
    {
        //Arrange.
        $s = new Student();

        //Act.
        $result = $s->getID();

        //Assert.
        //Check if null.
        $this->assertNotNull($result);
    }
}