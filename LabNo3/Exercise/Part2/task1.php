<?php

namespace zad1\subnamespace;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * Declare the abstract class Person
 * 
 */
abstract class Person
{
    protected $firstName, $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * magic method __toString()
     * 
     * @returns string
     */
    public function __toString()
    {
        return ($this->firstName . ' ' . $this->lastName);
    }

    /**
     * decalre abstract function salary()
     */
    abstract function salary();
}
