<?php

class A
{
    function __construct()
    {
        $this->foo();
        $this->bar();
    }

    function __destruct()
    {
        print 'Destroying ' . __CLASS__ . '<br>';
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
