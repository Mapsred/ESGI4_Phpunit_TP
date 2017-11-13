<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Utils\Calculator;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calc = new Calculator();
        $result = $calc->add(30, 12);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals(42, $result);
    }

    public function testSub()
    {
        $calc = new Calculator();
        $result = $calc->sub(30, 12);

        // assert that your calculator subbed the numbers correctly!
        $this->assertEquals(18, $result);
    }

    public function testMul()
    {
        $calc = new Calculator();
        $result = $calc->mul(30, 12);

        // assert that your calculator multiplied the numbers correctly!
        $this->assertEquals(360, $result);
    }

    public function testDiv()
    {
        $calc = new Calculator();
        $result = $calc->div(30, 12);

        // assert that your calculator divided the numbers correctly!
        $this->assertEquals(2.5, $result);
    }

    public function testAvg()
    {
        $calc = new Calculator();
        $result = $calc->avg([30, 12]);

        // assert that your calculator divided the numbers correctly!
        $this->assertEquals(21, $result);
    }


}
