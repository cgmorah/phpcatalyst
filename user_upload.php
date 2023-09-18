<?php
// File path of the CSV
$csvFile = 'users.csv';

// Open the file in read mode
$file = fopen($csvFile, 'r');

// Check if the file was opened successfully
if ($file) {
    // Read each line of the file
    while (($line = fgetcsv($file, 0, '|')) !== false) {
        // Get the values of each column
        $id = $line[0];
        $name = $line[1];
        $surname = $line[2];
        $email = $line[3];

        // Perform the writing logic here
        // For example, you can insert the data into a database or generate an output file

        // Example: Print the values to the console
        echo "ID: $id, Name: $name, Surname: $surname, Email: $email" . PHP_EOL;
    }

    // Close the file
    fclose($file);
    
} else {
    echo "Failed to open the file $csvFile";
}
?>