<?php

/* 
-- REST Clients --

A RESTful web service is a loose term describing web APIs implemented using HTTP and the principles of REST. A RESTful web service describes a collection of resources, along with basic operations a client can perform on those resources through the API.
For example, an API might describe a collection of authors and the books those authors have contributed to. The data within each object type is arbitrary. In this case, a “resource” is each individual author, each individual book, and the collections of all authors, all books, and the books each author has contributed to. Each resource must have a unique identifier so calls into the API know what resource is being retried or acted upon.
You might represent a simple set of classes to represent the book and author resources, as here in Example 15-1. */

class Book
{
    public $id;
    public $name;
    public $edition;
    public function __construct($id)
    {
        $this->id = $id;
    }
}

class Author
{
    public $id;
    public $name;
    public $books = array();
    public function __construct($id)
    {
        $this->id = $id;
    }
}

/* GET - Retrieve information about a resource or collection of resources
POST - Create a new resource
PUT - Update a resource with new data, or replace a collection of resources with new ones
DELETE - Delete a resource or a collection of resources

For example, the Books and Authors API might consist of the following REST endpoints, based on the data contained within the object classes:

GET /api/authors - Return a list of identifiers for each author in the collection as a JSON array
POST /api/authors - Given information about a new author as a JSON object, create a new author in the collection
GET /api/authors/id - Retrieve the author with identifier id from the collection and return it as a JSON object
PUT /api/authors/id - Given updated information about an author with identifier id as a JSON array, update that author’s information in the collection
DELETE /api/authors/id - Delete the author with identifier id from the collection

GET /api/authors/id/books - Retrieve a list of identifiers for each book the author with identifier id has con- tributed to as a JSON object
POST /api/authors/id/books - Given information about a new book as a JSON object, create a new book in the collection under the author with identifier id

GET /api/books/id - Retrieve the book with identifier id from the collection and return it as a JSON object

The GET, POST, PUT, and DELETE verbs provided by RESTful web services can be thought of as roughly corresponding to the Create, Retrieve, Update, and Delete operations typical to a database.


-- Responses --

In each of the above API endpoints, the HTTP status code is used to provide the result of the request. HTTP provides a long list of standard status codes: for example, 201 “Created” would be returned when creating a resource, and 501 “Not Implemented” would be returned when sending a request to an endpoint that doesn’t exist.
Many REST APIs use JSON (or JavaScript Object Notation) to carry responses from REST API endpoints. PHP natively supports converting data to JSON format from PHP variables and vice versa through its json extension.
To get a JSON representation of a PHP variable, use json_encode():
*/

$data = array(1, 2, "three");
$jsonData = json_encode($data);
echo $jsonData;
// [1, 2, "three"]\\


//Similarly, if you have a string containing JSON data, you can turn it into a PHP variable using json_decode():

$jsonData = "[1, 2, [3, 4], \"five\"]";
$data = json_decode($jsonData);
print_r($data);

/*
There is no direct translation between PHP objects and JSON objects—what JSON calls an “object” is really an associative array. If you need to convert JSON into instances of a PHP object class, you must write code to do so based on the format returned by the API.
However, the JsonSerializable interface allows you to convert objects into JSON data however you would like. If an object class does not implement the interface, json_decode() simply creates a JSON object containing keys and values corresponding to the object’s data members.
Otherwise, json_decode() calls the jsonSerialize() method on the class and uses that to serialize the object’s data.
This script adds the JsonSerializable interface to the Book and Author classes. In ad- dition, it adds a Factory class for turning JSON data representing Book and Author instances into PHP objects, as Example 15-2 shows.
Example 15-2. Book and Author JSON serialization
*/

class Book2 implements JsonSerializable
{
    public $id;
    public $name;
    public $edition;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function jsonSerialize()
    {
        $data = array(
            'id' => $this->id,
            'name' => $this->name, 'edition' => $this->edition
        );
        return $data;
    }
}

class Author2 implements JsonSerializable
{
    public $id;
    public $name;
    public $books = array();
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function jsonSerialize()
    {
        $data = array(
            'id' => $this->id, 'name' => $this->name, 'books' => $this->books
        );
        return $data;
    }
}

class ResourceFactory
{
    static public function authorFromJson($jsonData)
    {
        $author = new Author($jsonData['id']);
        $author->name = $jsonData['name'];
        foreach ($jsonData['books'] as $bookIdentifier) {
            $this->books[] = new Book($bookIdentifier);
        }
        return $author;
    }
    static public function bookFromJson($jsonData)
    {
        $book = new Book($jsonData['id']);
        $book->name = $jsonData['name'];
        $book->edition = (int) $jsonData['edition'];
        return $book;
    }
}

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
