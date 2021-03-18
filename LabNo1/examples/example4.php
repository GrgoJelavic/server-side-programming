<?php
// Class inheritance (Extend)
class A
{
    function foo()
    {
        print 'Parent';
    }
}

class B extends A
{   // Redifine the parent method

    function foo()
    {
        print 'Child class extends ';
        parent::foo();
    }
}

$b = new B();
$b->foo();
