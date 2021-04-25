<?php
include 'example.php';

// Example #7 Comparing Two Elements

$movies1 = new SimpleXMLElement($xmlstr);
$movies2 = new SimpleXMLElement($xmlstr);
var_dump($movies1 == $movies2); // false since PHP 5.2.0
