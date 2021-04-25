<?php

/*
-- Creating Resources --

To create a new resource, call the appropriate endpoint with the POST verb. The data for the request is put into the typical key-value form for POST requests.
In Example 15-5, the Author API endpoint for creating a new author takes the infor- mation to create the new author as a JSON-formatted object under the key 'data'.
Example 15-5. Creating an Author
*/

$newAuthor = new Author('pbmacintyre');
$newAuthor->name = "Peter Macintyre";
$url = "http://example.com/api/authors";
$data = array(
    'data' => json_encode($newAuthor)
);
$requestData = http_build_query($data, '', '&');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
curl_setopt($ch, CURLOPT_POST, true);
$response = curl_exec($ch);
$resultInfo = curl_getinfo($ch);
curl_close($ch);

/*
This script first constructs a new Author instance and encodes its values as a JSON- formatted string. Then, it constructs the key-value data in the appropriate format, provides that data to the curl object, then sends the request.

-- Deleting Resources --

Deleting a resource is similarly straightforward. Example 15-6 creates a request, sets the verb on that request to 'DELETE' via the curl_setopt() function, and sends it.
Example 15-6. Deleting a book
*/

$authorId = 'ktatroe';
$bookId = 'ProgrammingPHP';
$url = "http://example.com/api/authors/{$authorId}/books/{$bookId}";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
$result = curl_exec($ch);
$resultInfo = curl_getinfo($ch);
curl_close($ch);
