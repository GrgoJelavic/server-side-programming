<?php

// Example #6 Interaction between the finally block and return

function test()
{
    try {
        throw new Exception('foo');
    } catch (Exception $e) {
        return 'catch';
    } finally {
        return 'finally';
    }
}

echo test();
