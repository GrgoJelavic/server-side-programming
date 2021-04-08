<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * Declare the interface TalkInterface
 * 
 */
interface TalkInterface
{
    /**
     * @returns string 
     */
    public function talk();

    /**
     * @returns string 
     */
    public function eat();
}

/**
 *  Class Dog implements TalkInterface
 * 
 */
class Dog implements TalkInterface
{
    /**
     * @returns string 
     */
    public function talk()
    {
        return ('Vau Vau ... <br>');
    }

    /**
     * @returns string 
     */
    public function eat()
    {
        return ('Dog is eating ...');
    }
}

/**
 *  Class Cat implements TalkInterface
 * 
 */
class Cat implements TalkInterface
{

    /**
     * @returns string 
     */
    public function talk()
    {
        return ('Mijau mijau ...  <br>');
    }

    /**
     * @returns string 
     */
    public function eat()
    {
        return ('Cat is eating ... ');
    }
}

/**
 *  Class Horse implements TalkInterface
 * 
 */
class Horse implements TalkInterface
{

    /**
     * @returns string 
     */
    public function eat()
    {
        return ('Horse is eating ...');
    }

    /**
     * @returns string 
     */
    public function talk()
    {
        return ('Njiha njiha ... <br>');
    }
}

// RESULT: NO ERRORS FOR CORRECT INTERFACE IMPLEMENTATION

$dog = new Dog();
print $dog->eat();
print $dog->talk();

$cat = new Cat();
print  $cat->eat();
print $cat->talk();

$horse = new Horse();
print $horse->eat();
print $horse->talk();
