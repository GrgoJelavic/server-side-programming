<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * Declare the abstract class Animal
 * 
 */
abstract class Animal
{
    public function __construct($name, $animal)
    {
        $this->name = $name;
        $this->animal = $animal;
        $this->checkAnimalType();
    }

    /**
     * Checks animal type
     * 
     * @returns string if condition is false (if animal is not dog or horse)
     */
    private function checkAnimalType()
    {
        if ($this->animal != 'dog' || $this->animal != 'horse')
            print 'Error Animal Type - ' . $this->name . ' does not meet the conditions, ' . $this->animal . ' is not accetable.';
    }

    /**
     * Declaring the abstract method averageAnimalSpeed
     * 
     * @param integer $distance
     * @param integer $time
     */
    abstract public function averageAnimalSpeed($distance, $time);
}

/**
 * Class RaceAnimal extends abstract class Animal
 * 
 */
class RaceAnimal extends Animal
{
    public function __construct($name, $animal, $distance, $time)
    {
        parent::__construct($name, $animal);
        $this->time = $time;
        $this->distance = $distance;
    }

    /**
     * Calculates animal speed 
     * 
     * @param integer $distance
     * @param integer $time
     * 
     * @returns string 
     */
    public function averageAnimalSpeed($distance, $time)
    {
        //
    }
}
