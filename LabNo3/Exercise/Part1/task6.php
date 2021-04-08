<?php

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
     * Prints first name and last name of the person
     * 
     * @returns string if condition is false (if animal is not dog or horse)
     */
    public function __toString()
    {
        print($this->firstName . ' ' . $this->lastName);
    }


    /**
     * Declaring the abstract method salary
     */
    abstract public function salary();
}
