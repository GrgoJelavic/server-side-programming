<?php
// The print_r() construct intelligently displays what is passed to it, rather than casting everything to a string, as echo and print() do. Strings and numbers are simply printed. Arrays appear as parenthesized lists of keys and values, prefaced by Array:

$a = array('name' => 'Fred', 'age' => 35, 'wife' => 'Wilma'); print_r($a);
Array
(
[name]=>Fred, [age]=>35, [wife]=>Wilma);

// Using print_r() on an array moves the internal iterator to the position of the last ele- ment in the array. See Chapter 5 for more on iterators and arrays. When you print_r() an object, you see the word Object, followed by the initialized properties of the object displayed as an array:
class P {
var $name = 'nat';
// ...
}
$p = new P;
print_r($p); 

Object
(
[name]=>nat);
// Boolean values and NULL are not meaningfully displayed by print_r():
print_r(true); // prints "1"; 
print_r(false); // prints "";
print_r(null); // prints "";
