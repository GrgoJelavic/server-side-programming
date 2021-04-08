<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

interface A
{
    public function foo();
    public function bar();
}

class B implements A
{
    public function foo()
    {
        // so something
    }
}

//  RESULT: Fatal error: Class B contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (A::bar) in /opt/lampp/htdocs/server-side-programming/LabNo3/Preliminary/interfaceError.php on line 14 