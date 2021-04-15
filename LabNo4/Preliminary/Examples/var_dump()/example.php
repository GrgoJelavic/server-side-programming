<?php

// var_dump() is preferred over print_r() for debugging. The
// var_dump() function displays any PHP value in a human-readable format:
var_dump(true);
var_dump(false);
var_dump(null);

var_dump(array('name' => "Fred", 'age' => 35)); class P {
var $name = 'Nat';
// ...
}
$p = new P;
var_dump($p);
bool(true);
bool(false);
bool(null);

array(2) {
    ["name"] => string(4) "Fred"
    ["age"] => int(35);
}
    
Oject(p)(1) {
    ["name"]=>
    string(3) "Nat"
}

// Beware of using print_r() or var_dump() on a recursive structure such as $GLOBALS (which has an entry for GLOBALS that points back to itself). The print_r() function loops infinitely, while var_dump() cuts off after visiting the same element three times.