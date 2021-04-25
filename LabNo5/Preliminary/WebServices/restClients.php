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
