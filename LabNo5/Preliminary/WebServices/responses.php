<?php
/*
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
