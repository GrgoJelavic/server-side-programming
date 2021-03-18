<?php
//Pseudo varijable $this

class A
{
    function foo()
    {
        $this->bar();
        print 'Content of bar() : ' . $this->barContent;
    }

    function bar()
    {
        $this->barContent = 'Aspira';
    }
}

$a = new A();
print $a->foo();
