<?php

// Example #2 Getting <plot>

include 'example.php';

$movies = new SimpleXMLElement($xmlstr);

echo $movies->movie[0]->plot;
