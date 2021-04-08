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
     * 
     * @return string 
     */
    public function talk();

    /**
     * 
     * @return string 
     */
    public function eat();
}

/**
 * Declare Class Dog which implements TalkInterface
 * 
 */
class Dog implements TalkInterface
{
    /**
     * 
     * @return string 
     */
    public function talk()
    {
        return ('Vau Vau ... <br>');
    }

    /**
     * 
     * @return string 
     */
    public function eat()
    {
        return ('Dog is eating ...');
    }
}

/**
 * Declare Class Cat which implements TalkInterface
 * 
 */
class Cat implements TalkInterface
{
    /**
     * 
     * @return string 
     */
    public function talk()
    {
        return ('Mijau mijau ...  <br>');
    }

    /**
     * 
     * @return string 
     */
    public function eat()
    {
        return ('Cat is eating ... ');
    }
}

/**
 * Declare Class Horse which implements TalkInterface
 * 
 */
class Horse implements TalkInterface
{
    /**
     * @returns string 
     */
    public function eat()
    {
        print('Horse is eating ...');
    }
}

// RESULT: Fatal error: Class Horse contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (TalkInterface::talk) in /opt/lampp/htdocs/server-side-programming/LabNo3/Exercise/task3.php on line 30