<?php

/**
 *  PersonalZeroException which extends Exception
 */
class PersonalZeroException extends Exception
{
}

/**
 * Declare PersonalZeroException which extends Exception
 */
class Divide
{
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    /**
     * function divide divides two numbers
     * 
     * @returns string
     */
    function divide()
    {
        if ($this->b === 0) {
            throw new PersonalZeroException("Division by zero is not possible!");
        }
        return $this->a / $this->b;
    }
}

$divideNum = new Divide(10, 2);

try {
    echo $divideNum->divide() . '<br>';
} catch (PersonalZeroException $e) {
    echo ($e->getMessage() . '<br>');
} finally {
    echo "Operation complete.";
}
