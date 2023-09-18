<?php
// Print numbers 1 to 100
for ($i = 1; $i <= 100; $i++) {
    // Check the specified rules
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz";
    } elseif ($i % 3 == 0) {
        echo "Fizz";
    } elseif ($i % 5 == 0) {
        echo "Buzz";
    } else {
        echo $i;
    }

    echo PHP_EOL;
}
?>