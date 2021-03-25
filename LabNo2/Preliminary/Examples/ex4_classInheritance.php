<?php

final class BaseClass
{
    public function test()
    {
        echo 'BaseClass::test() called \n';
    }

    // Here it doesn't matter if you specify function as final or not
    final public function moreTesting()
    {
        echo 'BaseClass::moreTesting() called \n';
    }
}

class ChildClass extends BaseClass
{
}

// Result in fatal error: 'Class ChildClass may not inherit from final class (BaseClass)'.
