<?php
// Print numbers 1 to 100
for ($i = 1; $i <= 100; $i++) {
    // Check the specified rules
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "foobar";
    } elseif ($i % 3 == 0) {
        echo "foo";
    } elseif ($i % 5 == 0) {
        echo "bar";
    } else {
        echo $i;
    }

    // Print a comma and a space after each number, except the last one
    if ($i < 100) {
        echo ", ";
    }
}

// Print a newline after the last number
echo PHP_EOL;
?>