<?php

class Automobil
{
    function __construct($id, $brend, $marka)
    {
        $this->id = $id;
        $this->brend = $brend;
        $this->marka = $marka;

        print 'Automobil id: ' . $this->id . ', ' . $this->brend . ', ' . $this->marka;
    }
}

$autoObject = new Automobil(12345, 'Mercedes', 'AMG');
