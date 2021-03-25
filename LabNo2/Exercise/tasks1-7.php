<?php

// Tasks 1-4

/**
 * Class Person contains functions: construct (to assign persons id number), destruct (garbage collector), getters & setters (to get and set propery valuies )and gender (sets gender)
 * 
 * Each person needs to have following properties: id, name and height 
 */
class Person
{
    protected $id;
    protected $name;
    protected $height;
    public static $totalPersons;

    /**
     * @construct
     * Provides a list of arguments of the class when instantiating or creating an object.
     *
     * @returns persons id number assigned to a certain person
     * @returns total number of persons using the incrementations
     */
    function __construct()
    {
        $this->id = rand(1, 99999999);
        print 'ID number: ' . $this->id . ' is assigned. <br>';

        Person::$totalPersons++;
    }

    /**
     * @destruct
     * Invokes garbage collector automatically when the object goes out of scope or is explicitly destroyed 
     */
    function __destruct()
    {
        print $this->name . ' is beeing destroyed! <br>';
    }

    /**
     * Gets the class properties 
     * @param string $property
     * 
     * @returns property values
     */
    function __get($property)
    {
        print 'Accessed to protected property: ' . $property . '<br>';

        return $this->$property;
    }

    /**
     * Set the class properties (names and values)
     * 
     * @param string $property
     * @param string $values
     * 
     * @returns string with property values
     */
    function __set($property, $value)
    {
        switch ($property) {

            case 'name':
                $this->name = $value;
                break;

            case 'height':
                $this->height = $value;
                break;

            default:
                print $property . 'not found! <br>';
        }
        print 'Setting ' . $property . ' to ' . $value . '<br>';
    }

    // Task 8.1
    /**
     * @returns string 
     */
    final function Gender()
    {
        return 'n/a';
    }
}

// Task 5
$oPero = new Person();
$oPero->name = 'Pero';
$oPero->height = '1,80m';

$oMate = new Person();
$oMate->name = 'Mate';
$oMate->height = '1,90m';

print $oPero->name . ' is ' . $oPero->height . ' tall.<br><br>';

// Task 6
print 'Total number of person created: ' . Person::$totalPersons . '<br>';

// Task 7
print 'Mate je osoba: ';
var_dump($oMate instanceof Person);
print '<br><br>';
