<?php

namespace zad1;

include 'task1.php';

error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * Declare child class Employee which extends abstract class Person
 * 
 */
class Employee extends \zad1\subnamespace\Person
{
    private $salary;

    public function __construct($firstName, $lastName, $salary)
    {
        parent::__construct($firstName, $lastName);
        $this->salary = $salary;
    }

    /**
     *  salary implements abstract method salary
     */
    public function salary()
    {
        return $this->salary;
    }

    /**
     * gets salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * decalre abstract function salary()
     */
    public function __toString()
    {
        return ($this->firstName . ' ' . $this->lastName . ' has salary: ' . $this->salary . ' $');
    }
}

$john = new \zad1\Employee('john', 'doe', 9999);
print $john;
