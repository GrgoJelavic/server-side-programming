<?php

// Example #11 DOM Interoperability


$dom = new DOMDocument;
$dom->loadXML('<books><book><title>blah</title></book></books>');
if (!$dom) {
    echo 'Error while parsing the document';
    exit;
}

$books = simplexml_import_dom($dom);

echo $books->book[0]->title;
