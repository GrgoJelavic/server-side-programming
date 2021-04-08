<?php

abstract class A
{
    public function foo()
    {
        return 'foo';
    }

    abstract public function bar();
}

class B implements A
{
    public function foo()
    {
        // so something
    }

    public function bar()
    {
        // so something
    }
}
