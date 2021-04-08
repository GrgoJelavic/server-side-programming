<?php

namespace test;

include 'file1.php';

class FirstClass
{
    public function printTest()
    {
        print('test 2');
    }
}

$obj1 = new \test\FirstClass();

$obj2 = new \test\subnamespace\FirstClass();

$obj1->printTest();
$obj2->printTest();
