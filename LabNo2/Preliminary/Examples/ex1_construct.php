<?php

class A
{
    function __construct()
    {
        $this->foo();
        $this->bar();
    }

    function foo()
    {
        // do something
    }

    function bar()
    {
        // do something
    }
}
$a = new A();

class B
{
    function __construct($x, $y)
    {
        $this->foo($x);
        $this->bar($y);
    }

    function foo($x)
    {
        // do something
    }

    function bar($y)
    {
        // do something
    }
}
$b = new B('x', 'y');
