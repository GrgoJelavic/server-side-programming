<?php

// Example #6 Comparing Elements and Attributes with Text

include 'example.php';

$movies = new SimpleXMLElement($xmlstr);

if ((string) $movies->movie->title == 'PHP: Behind the Parser') {
    print 'My favorite movie.';
}

echo htmlentities((string) $movies->movie->title);
