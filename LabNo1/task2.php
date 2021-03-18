<?php

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
 * Returns string which depends if the sum is even or odd.
 * 
 * @param integer $sum
 * @return string 
 */
function nType($sum)
{
    if ($sum % 2 == 0) return 'The sum is even';
    else return 'The sum is odd';
}

print sum(2, 3);
print nType(sum(2, 3));
