<?php
// Property acces and method call

class A
{
    public $foo = 'property';

    public function bar()
    {
        return 'method';
    }
}

$obj = new A();

print $obj->foo . '<br>' . $obj->bar();
