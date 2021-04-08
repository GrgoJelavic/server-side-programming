<?php

namespace Foo\Bar;

include 'file1.php';

const FOO = 2;

function foo()
{
}

class Foo
{
    static function staticMethod()
    {
    }
}

/* Unqualified name */
foo(); // resolves to functions Foo\Bar\foo
foo::staticMethod(); // resolves to class Foo\Bar\foo, method static method
echo FOO; // resolves to constant Foo\Bar|FOO

/* Qualified name */
subnamespace\foo(); // resolves to function Foo\Bar\subnamespace\foo
subnamespace\foo::staticMethod(); // resolves to class Foo\Bar\subnamespace\foo, method staticmethod

echo subnamespace\FOO; // resolves to constant Foo\Bar\subnamespace\FOO


/* Fully qualified name */
\Foo\Bar\foo(); //resolves to function Foo\Bar\foo, method staticmethod
\Foo\Bar\foo::staticMethod(); // resolves to class Foo\Bar|foo,. method staticmethod
echo \Foo\Bar\FOO; // resolves to constant Foo\Bar|FOO
