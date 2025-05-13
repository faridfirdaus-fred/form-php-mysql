# Form Chat - Contact Form Application

A simple and elegant contact form application built with PHP, MySQL, and Bootstrap. This application allows users to submit contact information and messages through a web form, with data stored in a MySQL database.

## Features

- Responsive contact form with modern UI design
- Form validation for required fields
- Data storage in MySQL database
- Success message display after form submission
- View all submitted messages
- Bootstrap 5 styling for a clean, modern look

## Prerequisites

- PHP 7.0 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- XAMPP (recommended for local development)

## Installation

1. Clone or download this repository to your web server's document root (e.g., `htdocs` folder for XAMPP)

2. Create the database and table by importing the `database-setup.sql` file:

   ```bash
   mysql -u your_username -p < database-setup.sql
   ```

   Or use phpMyAdmin to import the SQL file.

3. Configure the database connection:

   - Open `api/db-connect.php`
   - Update the database credentials according to your setup:
     ```php
     $host = 'localhost';
     $dbname = 'form_data';
     $username = 'your_username';
     $password = 'your_password';
     ```

4. Access the application through your web browser:
   ```
   http://localhost/form-chat/
   ```

## Project Structure

```
form-chat/
├── api/
│   ├── db-connect.php    # Database connection configuration
│   ├── process-form.php  # Form submission handler
│   └── view-data.php     # View submitted messages
├── index.php            # Main contact form page
├── database-setup.sql   # Database schema
└── README.md           # This file
```

## Usage

1. Open the application in your web browser
2. Fill out the contact form with:
   - Full Name
   - Email Address
   - Phone Number
   - Message
3. Click "Kirim Pesan" to submit
4. View all submitted messages by clicking the "Lihat semua pesan" link

## Security Features

- Input validation and sanitization
- Prepared statements for database queries
- Required field validation
- Email format validation

## Contributing

Feel free to submit issues and enhancement requests!

## License

This project is open source and available under the MIT License.
