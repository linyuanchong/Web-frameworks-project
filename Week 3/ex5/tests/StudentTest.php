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

    public function testGetIDReturnsMinusOneForNewStudent() {
        //Arrange.
        $s = new Student();
        $expectedValue = -1;

        //Act.
        $result = $s->getID();

        //Assert.
        //Check if equals.
        $this->assertEquals($expectedValue, $result);
    }

    public function testGetIDReturnsEightAfterSet() {
        //Arrange.
        $s = new Student();
        $expectedValue = 8;

        //Act.
        $result = $s->setID(8);

        //Assert.
        //Check if equals.
        $this->assertEquals($expectedValue, $result);
    }

    public function testGetGPAValueOneMatchesPreviousSetGPAValue() {
        //Arrange.
        $s = new Student();
        $expectedValue = 1;

        //Act.
        $result = $s->getGPA();

        //Assert.
        //Check if equals.
        $this->assertEquals($expectedValue, $result);
    }

    public function testGetGpaValueFourMatchesPreviousSetGpaValueFour()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 4;

        // Act
        $s->setGpa(4);
        $result = $s->getGpa();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetGpaReturnsZeroBeforeAnySetGpa()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        // Act
        $result = $s->getGpa();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetGpaReturnsANumber()
    {
        // Arrange
        $s = new Student();

        // Act
        $result = $s->getGpa();

        // Assert
        $this->assertIsNotNumeric($result);
    }


    public function testGetGpaAfterNegativeSetGpaReturnsZero()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        // Act
        $s->setGpa(-99);
        $result = $s->getGpa();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


    public function testGetGpaAfterNegativeSetGpaAfterPositiveSetReturnsZero()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        // Act
        $s->setGpa(2);
        $s->setGpa(-99);
        $result = $s->getGpa();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetGpaReturnsZeroAfterSetGpaGreaterThanFour()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        // Act
        $s->setGpa(100);
        $result = $s->getGpa();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


    public function testGetGpaReturnsFourAfterSetGpaFour()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 4;

        // Act
        $s->setGpa(4);
        $result = $s->getGpa();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


    public function testGetGpaReturnsMaxGpaAfterSetGpaMaxGpa()
    {
        // Arrange
        $s = new Student();
        $expectedResult = Student::MAX_GPA;

        // Act
        $s->setGpa(Student::MAX_GPA);
        $result = $s->getGpa();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider providerForGpaTest
     * @param $value
     * @param $expectedResult
     */
    public function testSetGetGpaWithProvider($value, $expectedResult)
    {
        // Arrange
        $s = new Student();

        // Act
        $s->setGpa($value);
        $result = $s->getGpa();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function providerForGpaTest()
    {
        //Value in / expected getGpa() result.
        return [
            [0, 0],
            [0.5, 0.5],
            [1, 1],
            [3, 3],
            [4, 4],
            [5, 0],
            [99, 0],
            [-99, 0],
            [-1, 0],
            [-0.1, 0]
        ];
    }

}