<?php

/**
 * Calculator
 *
 * @author Gavin Corbett <gav.corbett@gmail.com>
 * @version $Id$
 * @copyright Gavin Corbett
 */
class Calculator
{
    const ADDITION = '+';
    const SUBTRACTION = '-';
    const MULTIPLICATION = '*';
    const DIVISION = '/';

    protected $_validOperators = array(
        self::ADDITION,
        self::SUBTRACTION,
        self::MULTIPLICATION,
        self::DIVISION,
    );

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Parses the input into a valid array
     *
     * @param string $sumString
     * @return int
     */
    public function sum($sumString)
    {
        $sumString = preg_replace('/[^0-9|\+|\-|\*|\/]/', '', $sumString);

        if (preg_match_all('/[0-9|\*|\/|\+\-]/', $sumString, $sum) === false) {
            return 0;
        }

        return $this->_process(array_shift($sum));
    }

    /**
     * Process the sum
     *
     * @param array $sum
     * @return int
     */
    protected function _process(array $sum)
    {
        $answer = 0;

        foreach ($sum as $index => $part) {
            if ($this->_isOperator($part)) {
                $answer += $this->_calculate($sum[$index-1], $sum[$index+1], $sum[$index]);
            }
        }

        return $answer;
    }

    /**
     * Checks if the value is a valid operator
     *
     * @param string $value
     * @return boolean
     */
    protected function _isOperator($value)
    {
        if (in_array($value, $this->_validOperators)) {
            return true;
        }

        return false;
    }


    /**
     * Calculates the value for the operator and the two integers
     *
     * @param int $value1
     * @param int $value2
     * @param string $operator
     * @return int
     */
    protected function _calculate($value1, $value2, $operator)
    {
        switch ($operator) {
            case self::ADDITION:
                return $value1 + $value2;
            case self::SUBTRACTION:
                return $value1 - $value2;
            case self::MULTIPLICATION:
                return $value1 * $value2;
            case self::DIVISION:
                return $value1 / $value2;
            default:
                return 0;
        }
    }
}
