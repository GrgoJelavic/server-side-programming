<?php

/**
 * Declare the interface TalkInterface
 * 
 */

interface TalkInterface
{
    /**
     * Declare method Talk which child class  has to implement
     * 
     * @return string 
     */
    public function Talk();

    /**
     * Declare method Eat which child class  has to implement
     * 
     * @return string 
     */
    public function Eat();
}
