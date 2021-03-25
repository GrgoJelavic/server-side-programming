<?php

class A
{
    protected $propertyA;
    protected $propertyB;

    function __get($property)
    {
        print 'Accessed to protected property: ' . $property . '<br>';

        return $this->$property;
    }

    function __set($property, $value)
    {
        switch ($property) {

            case 'propertyA':
                $this->propertyA = $value;
                break;

            case 'propertyB':
                $this->propertyB = $value;
                break;

            default:
                print $property . 'not found!';
        }
        print 'Setting ' . $property . ' to ' . $value . '<br>';
    }
}

$a = new A();
$a->propertyA = 'Some value A';
$a->propertyB = 'Some value B';

print  'A = ' . $a->propertyA . ', and B = ' . $a->propertyB;
