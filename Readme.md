# User Registration System

This is a simple user registration system implemented using PHP, MySQL, Bootstrap, and jQuery. It allows users to submit their details (name, email, phone number, and message) through a registration form. The form data is validated both client-side and server-side, and successfully registered users are stored in a MySQL database.

## Project Setup

### Prerequisites

1. **PHP**: Ensure you have PHP installed on your system. You can download it from [PHP official website](https://www.php.net/downloads.php).
2. **MySQL**: Ensure you have MySQL or MariaDB installed and running. You can download MySQL from [MySQL official website](https://dev.mysql.com/downloads/).
3. **Web Server**: You'll need a web server like Apache or Nginx to serve your PHP files.
4. **Database**: This project uses MySQL. Ensure you have phpMyAdmin or a MySQL client available to create the database.

### Installation

1. Clone or download this repository to your local machine.
   
2. Set up your MySQL database:

   - Create a database called `user_submission`.
   - Import the provided SQL file to create the `user_detail` table and insert sample data.

   You can run the following SQL script in phpMyAdmin or any MySQL client:

   ```sql
   CREATE DATABASE user_submission;
   USE user_submission;
   -- Run the dump file to create table and insert data.
