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
    public function Talk();

    /**
     * 
     * @return string 
     */
    public function Eat();
}

/**
 * Declare Class Dog which implements TalkInterface
 * 
 */
class Dog implements TalkInterface
{
    //
}
/**
 * Declare Class Cat which implements TalkInterface
 * 
 */
class Cat implements TalkInterface
{
    //
}
/**
 * Declare Class Horse which implements TalkInterface
 * 
 */
class Horse implements TalkInterface
{
    //
}


// RESULT:  Fatal error: Class Dog contains 2 abstract methods and must therefore be declared abstract or implement the remaining methods (TalkInterface::Talk, TalkInterface::Eat) in /opt/lampp/htdocs/server-side-programming/LabNo3/Exercise/task2.php on line 13