<?php

/**
 * Vjezba 1
 * Klase i funckije
 */

// Funkcije
function foo()
{
    return 1;
}

function bar()
{
    return 2;
}

$sum = foo() + bar();
print $sum;

// Klase
class A
{
    function foo()
    {
        return 1;
    }

    function bar()
    {
        return 2;
    }
}
$a = new A();

$sum = $a->foo() + $a->bar();
print $sum;
