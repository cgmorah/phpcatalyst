<?php
// Get command line arguments
$options = getopt("f:", ["file:", "create_table", "dry_run", "u:", "p:", "h", "help"]);

// Check if help option was provided
if (isset($options['help'])) {
    echo "Command line options:\n";
    echo "--file [csv file name] - This is the name of the CSV to be parsed.\n";
    echo "--create_table - This will cause the MySQL users table to be built (and no further action will be taken).\n";
    echo "--dry_run - This will be used with the --file directive in case we want to run the script but not insert into the DB. All other functions will be executed, but the database won't be altered.\n";
    echo "-u - MySQL username.\n";
    echo "-p - MySQL password.\n";
    echo "-h - MySQL host.\n";
    echo "--help - Output the list of directives with details.\n";
    exit;
}

// Check if CSV file name was provided
if (isset($options['f']) || isset($options['file'])) {
    // Get the name of the file provided
    $csvFile = isset($options['f']) ? $options['f'] : $options['file'];

    // Check if the file exists
    if (file_exists($csvFile)) {
        // Connect to MySQL database
        $host = isset($options['h']) ? $options['h'] : "localhost";
        $username = isset($options['u']) ? $options['u'] : "your_username";
        $password = isset($options['p']) ? $options['p'] : "your_password";
        $database = "your_database";
        $conn = new mysqli($host, $username, $password, $database);

        // Check if the connection was successful
        if ($conn->connect_error) {
            die("Database connection error: " . $conn->connect_error);
        }

        // Create the "users" table if the --create_table option was given
        if (isset($options['create_table'])) {
            $sql = "CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                surname VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE
            )";

            if ($conn->query($sql) === true) {
                echo "The 'users' table has been created successfully." . PHP_EOL;
            } else {
                echo "Error creating 'users' table: " . $conn->error . PHP_EOL;
            }
        }

        // Read the CSV file and process records
        $file = fopen($csvFile, 'r');
        if ($file) {
            while (($line = fgetcsv($file, 0, '|')) !== false) {
                $name = ucfirst(strtolower($line[1]));
                $surname = ucfirst(strtolower($line[2]));
                $email = strtolower($line[3]);

                // Validate email format
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // Insert record in database if not running in dry run mode
                    if (!isset($options['dry_run'])) {
                        $sql = "INSERT INTO users (name, surname, email) VALUES ('$name', '$surname', '$email')";
                        if ($conn->query($sql) === true) {
                            echo "Record inserted successfully: $name $surname $email" . PHP_EOL;
                        } else {
                            echo "Error inserting record: " . $conn->error . PHP_EOL;
                        }
                    } else {
                        echo "Dry run mode: Record not inserted: $name $surname $email" . PHP_EOL;
                    }
                } else {
                    echo "Error: Invalid email format: $email" . PHP_EOL;
                }
            }
            fclose($file);
        } else {
            echo "Error opening file $csvFile" . PHP_EOL;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "File $csvFile does not exist" . PHP_EOL;
    }
} else {
    echo "Error: You must provide the CSV file name. Use -f or --file to specify the file." . PHP_EOL;
}
?>