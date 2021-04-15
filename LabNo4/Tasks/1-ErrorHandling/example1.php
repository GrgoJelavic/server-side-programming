<?php

function inverse($x)
{
    if (!$x) {
        throw new Exception('Divison by zero.');
    }
    return 1 / $x;
}

try {
    echo inverse(5) . "\n";
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}

// Continue execution

echo 'Hello World\n"';


// Result: 0.2 Caught exception: Divison by zero. Hello World\n"