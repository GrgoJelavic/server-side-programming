<?php

// Example #3 Getting <line>

include 'example.php';

$movies = new SimpleXMLElement($xmlstr);

echo $movies->movie->{'great-lines'}->line;
