<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

include './tasks1-7.php';
// Task 8.2
/**
 * Class Employee inheritates class Person
 */
class Employee extends Person
{
    /**
     * @returns string 
     */
    function Gender()
    {
        return 'female';
    }
}
$employee = new Employee();
print $employee->Gender();

// Results in Fatal error: Method 'Employee::Gender()' cannot override final method 'Person::gender()'.
