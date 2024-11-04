# ChopURL

**ChopURL** is a lightweight RESTful API built with Laravel for shortening URLs, designed to make sharing long links easier. With built-in user authentication and visit tracking features, ChopURL provides a secure and efficient way to manage and share URLs.

## Features

### v1

- **User Registration**: Allows users to create an account.
- **User Login**: Authenticates users and returns an API key using Laravel Sanctum.
- **URL Shortening**: Users can submit long URLs to receive a unique shortened URL. If the same long URL is submitted again, the existing short URL is returned.
- **List Registered URLs**: Users can retrieve a list of URLs they have shortened.
- **Redirect Service**: Accessing any shortened URL in a browser redirects to the original long URL.

### v2

- **All v1 Features**: Maintains all functionalities from version 1.
- **Visit Tracking**: Counts and tracks the number of visits for each shortened URL.

## Getting Started

### Prerequisites

- [PHP](https://www.php.net/) (v8.0 or later)
- [Composer](https://getcomposer.org/) for PHP package management
- [Laravel](https://laravel.com/) (v8 or later)
- [MySQL](https://www.mysql.com/) or any compatible database

