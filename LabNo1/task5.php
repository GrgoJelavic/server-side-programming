<?php

/**
 * Class MainParent contains two functions, function to sum two numbers and to check if the sum is even or odd
 */
class MainParent
{
    /**
     * Returns the sum of two numbers and checks the result type.
     * 
     * @param integer $num1
     * @param integer $num2
     * @return integer 
     */
    function sum($num1, $num2)
    {
        $sum = $num1 + $num2;


        $this->nType($sum);

        print 'Sum: ' . $sum  . $this->barContent;
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

/**
 * Class MainChild inheriets Class MainParent and has function to subtract two numbers if the result is even numger
 */
class MainChild extends MainParent
{
    /**
     * Returns the string which depends if the result is even or odd, and divides result by 2 if it is even.
     * 
     * @param integer $sum
     * @return integer 
     */
    function nType($sum)
    {
        $this->barContent = ($sum % 2 != 0) ? '<br>The sum is odd!' : '<br>The sum is even! <br>Sum divided by 2 =  ' . $sum / 2;
    }
}


$child = new MainChild();
$child->sum(4, 4);
