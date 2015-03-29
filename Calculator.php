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

        die(var_dump($sum));
    }
}
