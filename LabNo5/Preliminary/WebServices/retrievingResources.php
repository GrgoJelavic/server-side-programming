<?php

/*
-- Retrieving Resources --

Retrieving information for a resource is a straightforward GET request. Exam- ple 15-3 uses the curl extension to format an HTTP request, set parameters on it, send the request, and get the returned information.

Example 15-3. Retrieving Author data
*/

$authorId = 'ktatroe';
$url = "http://example.com/api/authors/{$authorId}";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$response = curl_exec($ch);
$resultInfo = curl_getinfo($ch);
curl_close($ch);
// decode the JSON and use a Factory to instantiate an Author object
$authorJson = json_decode($response);
$author = ResourceFactory::authorFromJson($authorJson);

/*
To retrieve information about an author, this script first constructs a URL representing the endpoint for the resource. Then, it initializes a curl resource and provides the con- structed URL to it. Finally, the curl object is executed, which sends the HTTP request, waits for the response, and returns it.
In this case, the response is JSON data, which is decoded and handed off to a Factory method of Author to construct an instance of the Author class.


-- Updating Resources --

Updating an existing resource is a bit trickier than retrieving information about a resource. In this case, you need to use the PUT verb. As the PUT verb was originally intended to handle file uploads, PUT requests require that you stream data to the remote service from a file.
Rather than creating a file on disk and streaming from it, the script in Example 15-4 uses the 'memory' stream provided by PHP, first filling it with the data to send, then rewinding it to the start of the data it just wrote, and finally pointing the curl object at the file.
Example 15-4. Updating book data
*/
$bookId = 'ProgrammingPHP';
$url = "http://example.com/api/books/{$bookId}";
$data = json_encode(array(
    'edition' => 3
));
$requestData = http_build_query($data, '', '&');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$fh = fopen("php://memory", 'rw');

fwrite($fh, $requestData);
rewind($fh);
curl_setopt($ch, CURLOPT_INFILE, $fh);
curl_setopt($ch, CURLOPT_INFILESIZE, mb_strlen($requestData));
curl_setopt($ch, CURLOPT_PUT, true);
$response = curl_exec($ch);
$resultInfo = curl_getinfo($ch);
curl_close($ch);
fclose($fh);
