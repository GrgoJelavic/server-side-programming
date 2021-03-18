<?php

/**
 * Class Main  contains two functions, function to sum two numbers and to check if the sum is even or odd
 */
class Main
{
    /** Returns the sum of two numbers and checks the result type. 
     * 
     * @param integer $num1
     * @param integer $num2
     * @return integer 
     */
    function sum($num1, $num2)
    {
        $sum = $num1 + $num2;
        $this->nType($sum);

        print 'Sum: ' . $sum . ' - ' . $this->barContent;
    }

    /**
     * Returns string which depends if the sum is even or odd.
     * 
     * @param integer $sum
     * @return string 
     */
    function nType($sum)
    {
        $this->barContent = ($sum % 2 == 0) ? 'The sum is even' : 'The sum is odd';
    }
}

$oMain = new Main();
$oMain->sum(2, 3);
