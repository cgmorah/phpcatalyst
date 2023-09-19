# PHP Programming Evaluation for Catalyst IT 🚀

This project is a PHP programming evaluation for Catalyst IT. The goal is to create a PHP script that runs from the command line, accepts a CSV file as input, and processes the CSV file data to insert it into a MySQL database.

## Table of Contents 📚

- [Project Description](#user-content-project-description-)
- [Requirements](#user-content-requirements-)
- [Dependencies](#user-content-dependencies-)
- [Installation](#user-content-installation-️)
- [Command Line Options](#user-content-command-line-options-️)
- [User Table Definition](#user-content-user-table-definition-)
- [Data Processing](#user-content-data-processing-)
- [Error Handling](#user-content-error-handling-️)
- [Source Code Control](#user-content-source-code-control-)
- [Assumptions](#user-content-assumptions-)
- [Contact](#user-content-contact-)

## Project Description 📋

The CSV file will contain user data and will have three columns: name, surname, email. The script will iterate through the CSV rows and insert each record into a dedicated MySQL database in the "users" table.

The PHP script will be named `user_upload.php` and the CSV file will be named `users.csv`.

The steps followed for the creation of this project were:

1. Create a new PHP project.
2. Create a file named user_upload.php which will be our main script.
3. Read the provided CSV file using the --file option on the command line.
4. Validate the format of each email address in the CSV file.
5. Capitalize the name and surname of each user before inserting it into the database.
6. Convert email addresses to lowercase before inserting them into the database.
7. Create a table in the MySQL database called "users" with the fields name, surname, and email.
8. Insert each record from the CSV file into the "users" table in the database.
9. If the --create_table option is used, only the table should be created and no other action should be taken.
10. If the --dry_run option is used, all functions should be executed, but the database should not be altered.
11. Use the -u, -p, and -h options to configure the MySQL username, password, and host respectively.
12. If the --help option is used, display a list of all options and their details.
13. Implement an additional script called foobar.php that prints the numbers from 1 to 100 according to the rules specified in the problem statement.
14. Add a --no_header command line option to handle CSV files without a header.

## Requirements 📌

- PHP 8.1.x
- MySQL 5.7 or higher (or MariaDB 10.x)
- Ubuntu 22.04

## Dependencies 📦

This project requires the following dependencies:

1. **PHP**: This project requires PHP version 8.1.x. You can install it on Ubuntu using the following command:
```
sudo apt-get install php8.1
```

2. **MySQLi**: This is a PHP extension that allows interaction with MySQL databases. You can install it on Ubuntu using the following command:    
```
sudo apt-get install php-mysqli
```

3. **MySQL Server**: This project requires a MySQL server to store user data. You can install MySQL Server on Ubuntu using the following command:
```
sudo apt-get install mysql-server
```
4. **Git**: This project uses Git as its version control system. You can install Git on Ubuntu using the following command:
```
sudo apt-get install git
```
Please ensure that these dependencies are installed before running the script.

## Installation 🛠️

1. Clone the repository: `git clone [repository_url]`
2. Install the required dependencies: `composer install`
3. Configure the MySQL database connection in `config.php`
4. Run the script using the command line: `php user_upload.php [options]`

## Command Line Options ⌨️

- `--file [csv file name]` - this is the name of the CSV to be parsed.
- `--create_table` - this will cause the MySQL users table to be built (and no further action will be taken).
- `--dry_run` - this will be used with the --file directive in case we want to run the script but not insert into the DB. All other functions will be executed, but the database won't be altered.
- `-u` - MySQL username.
- `-p` - MySQL password.
- `-h` - MySQL host.
- `--help` - output the list of directives with details.
- `--no_header` - indicates that the CSV file does not have a header.

## User Table Definition 📄

The MySQL table should contain at least these fields:

- `name`
- `surname`
- `email` (the email should be set to a UNIQUE index).

## Data Processing 🔄

- The script will capitalize the name and surname fields before inserting them into the database.
- The email addresses will be converted to lowercase before insertion.
- The script will validate the email address format before inserting it into the database. If an email is invalid, no insert will be made, and an error message will be displayed.

## Error Handling ⚠️

The script is designed to be robust and gracefully handle errors and exceptions. Error messages will be reported to STDOUT.

## Source Code Control 📝

The code for this project is managed using Git as the Version Control System. The repository is available at https://github.com/cgmorah/phpcatalyst.

## Assumptions 💡

- The script will be run on an Ubuntu 22.04 instance.
- PHP version 8.1.x is used.
- The MySQL database server is already installed and is version 5.7 or higher (or MariaDB 10.x).
- The database user details can be configured.

## Contact 📞

For any questions or support, please contact cgmorah@gmail.com.

---

Made with ❤️ by [Giovanni Mora](https://github.com/cgmorah)