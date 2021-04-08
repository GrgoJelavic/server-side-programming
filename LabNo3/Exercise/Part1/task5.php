<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * Declare the interface TalkInterface
 * 
 */
interface TalkInterface
{
    const fastest = 'Horse';

    /**
     * Declare method Talk which child class has to implement
     * 
     * @return string 
     */
    public function talk();

    /**
     * Declare method Eat which child class  has to implement
     * 
     * @return string 
     */
    public function eat();
}

/**
 *  Class Dog  implements TalkInterface
 * 
 */
class Dog implements TalkInterface
{
    const fastest = 'Dog';
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
 *  Class Cat  implements TalkInterface
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
 *  Class Horse  implements TalkInterface
 * 
 */
class Horse implements TalkInterface
{

    /**
     * 
     * @return string 
     */
    public function eat()
    {
        return ('Horse is eating ...');
    }

    /**
     * 
     * @return string 
     */
    public function talk()
    {
        return ('Njiha njiha ... <br>');
    }
}

// RESULT: Fatal error: Cannot inherit previously-inherited or override constant fastest from interface TalkInterface in /opt/lampp/htdocs/server-side-programming/LabNo3/Exercise/task5.php on line 33

$dog = new Dog();
print $dog->eat();
print $dog->talk();

$cat = new Cat();
print  $cat->eat();
print $cat->talk();

$horse = new Horse();
print $horse->eat();
print $horse->talk();
