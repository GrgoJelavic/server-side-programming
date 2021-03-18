<?php

/**
 * Math operations is the central class of the math application.
 * It holds the sum, subtract, multiply and divide mathematical operations.
 */

class MathOperations
{
    /**
     * Returns the sum of two numbers.
     * 
     * @param integer $num1
     * @param integer $num2
     * @return integer 
     */
    function sum($num1, $num2)
    {
        return $num1 + $num2;
    }

    /**
     * Returns the difference of two numbers.
     * 
     * @param integer $num1
     * @param integer $num2
     * @return integer 
     */
    function subtract($num1, $num2)
    {
        return $num1 - $num2;
    }

    /**
     * Returns the multiply value of two numbers.
     * 
     * @param integer $num1
     * @param integer $num2
     * @return integer 
     */
    function multiply($num1, $num2)
    {
        return $num1 * $num2;
    }

    /**
     * Returns the multiply value of two numbers.
     * 
     * @param integer $num1
     * @param integer $num2
     * @return integer 
     */
    function divide($num1, $num2)
    {
        if ($num1 == 0) return 'Error infinity, can not divide zero';

        return $num1 / $num2;
    }
}

$oMath = new MathOperations();
print $oMath->sum(5, 1);
print $oMath->subtract(5, 1);
print $oMath->multiply(5, 1);
print $oMath->divide(5, 0);
