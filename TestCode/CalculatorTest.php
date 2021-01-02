<?php


use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private $calculator;

    protected function setUp(): void
    {
        require_once "Calculator.php";
        $this->calculator = new Calculator();
    }

    protected function tearDown(): void
    {
        $this->calculator = NULL;
    }

    public function testAdd()
    {
        $result = $this->calculator->add(5, 6);
        $this->assertEquals(8, $result);
    }

    public function testMultiplication()
    {
        $result = $this->calculator->Multiply(5, 6);
        $this->assertEquals(30, $result);
    }
    public function testSubtraction()
    {
        $result = $this->calculator->Subtraction(7, 6);
        $this->assertEquals(3, $result);
    }

}
