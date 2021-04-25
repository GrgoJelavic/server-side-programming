<?php

// Example #5 Using attributes
include 'example.php';

$movies = new SimpleXMLElement($xmlstr);

/* Access the <rating> nodes of the first movie.
 * Output the rating scale, too. */
foreach ($movies->movie[0]->rating as $rating) {
    switch ((string) $rating['type']) { // Get attributes as element indices
        case 'thumbs':
            echo $rating, ' thumbs up';
            break;
        case 'stars':
            echo $rating, ' stars';
            break;
    }
}
