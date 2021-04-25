<?php
// Example #4 Accessing non-unique elements in SimpleXML
include 'example.php';

$movies = new SimpleXMLElement($xmlstr);

/* For each <character> node, we echo a separate <name>. */
foreach ($movies->movie->characters->character as $character) {
    echo $character->name, ' played by ', $character->actor, PHP_EOL;
}
