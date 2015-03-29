<?php
require_once('Calculator.php');

/**
 * testCalculator
 *
 * @uses PHPUnit_Framework_TestCase
 * @author Gavin Corbett <gav.corbett@gmail.com>
 * @version $Id$
 * @copyright Gavin Corbett
 */
class testCalculator extends PHPUnit_Framework_TestCase
{
    protected $_calculator = null;

    public function setUp()
    {
        $this->_calculator = new Calculator();
    }

    public function testBodmas()
    {
        $this->assertEquals(7, $this->_calculator->sum('1 + 1 * 3 + 3'));
        $this->assertEquals(7, $this->_calculator->sum('1+1*3+3'));
    }
    public function testAddition()
    {
        $this->assertEquals(2, $this->_calculator->sum('1 + 1'));
        $this->assertEquals(2, $this->_calculator->sum('1+1'));
    }

    public function testSubtraction()
    {
        $this->assertEquals(0, $this->_calculator->sum('1 - 1'));
        $this->assertEquals(0, $this->_calculator->sum('1-1'));
    }

    public function testMutliplication()
    {
        $this->assertEquals(10, $this->_calculator->sum('5 * 2'));
        $this->assertEquals(10, $this->_calculator->sum('5*2'));
    }

    public function testDivision()
    {
        $this->assertEquals(4, $this->_calculator->sum('8 / 2'));
        $this->assertEquals(4, $this->_calculator->sum('8/2'));
    }

}
