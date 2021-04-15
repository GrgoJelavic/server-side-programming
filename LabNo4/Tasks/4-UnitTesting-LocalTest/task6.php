<?php


/**
 *  Class Test is checking if the result value is equal as 1 and '1'
 */
class Test
{
    function __construct($input)
    {
        var_dump($input);
        if ($input == 1) self::doSomething();
        else print 'Not true!';
    }

    /**
     *  Prints do somethingå
     */
    public function doSomething()
    {
        print '.. do something ..';
    }
}

$input = '1';
$test = new Test($input);

// Vrijednost i tip podatka varijable $input je string 1
// Modifikacija je napravljena tako da se umjesto provjeravanja input varijable u konstruktoru koristi "==" umjesto "===", jer "===" projverava i tip i vrijednost podataka dok "==" provjerava samo vrijednost