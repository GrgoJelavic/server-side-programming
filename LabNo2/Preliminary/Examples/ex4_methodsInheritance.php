<?php

class BaseClass
{
    public function test()
    {
        echo 'BaseClass::test() called \n';
    }

    final public function moreTesting()
    {
        echo 'BaseClass::moreTesting() called \n';
    }
}

class ChildClass extends BaseClass
{
    public function moreTesting()
    {
        echo 'ChildClass::moreTesting() called \n';
    }
}

// Result in fatal error: Method 'ChildClass::moreTesting()' cannot override final method 'BaseClass::moreTesting()'.