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

### Api EndPoint


Here's a breakdown of what the endpoints would look like in v1 and v2 along with example URLs for each:

### v1 Endpoints
User Registration

Endpoint: POST /api/v1/register
Example: POST http://yourdomain.com/api/v1/register
Purpose: Allows a new user to register by sending a request with user details.
User Login

Endpoint: POST /api/v1/login
Example: POST http://yourdomain.com/api/v1/login
Purpose: Authenticates the user and returns an API key (Sanctum token) for accessing protected endpoints.
Shorten URL (Authenticated)

Endpoint: POST /api/v1/shorten
Example: POST http://yourdomain.com/api/v1/shorten
Purpose: Accepts a long URL and returns a shortened version. Requires a valid API token.
List User URLs (Authenticated)

Endpoint: GET /api/v1/urls
Example: GET http://yourdomain.com/api/v1/urls
Purpose: Lists all shortened URLs created by the authenticated user.
Redirect to Original URL (Public)

Endpoint: GET /api/v1/url/{shortUrl}
Example: GET http://yourdomain.com/api/v1/url/abc123
Purpose: Redirects the browser from the shortened URL to the original long URL. This route does not require authentication.
#### v2 Endpoints
v2 includes all v1 functionality but adds additional tracking capabilities.

List User URLs (Authenticated, Same as v1)

Endpoint: GET /api/v2/urls
Example: GET http://yourdomain.com/api/v2/urls
Purpose: Lists all shortened URLs created by the authenticated user.
Redirect to Original URL (Public, Same as v1)

Endpoint: GET /api/v2/url/{shortUrl}
Example: GET http://yourdomain.com/api/v2/url/abc123
Purpose: Redirects to the original URL. This route does not require authentication.
Get URL Details and Visit Count (Authenticated)

Endpoint: GET /api/v2/url/view/{id}
Example: GET http://yourdomain.com/api/v2/url/view/1
Purpose: Returns details of the URL (including visit count). id here would be the unique identifier for the URL in the database.
Summary of Example Endpoints
### v1
POST /api/v1/register - Register a user
POST /api/v1/login - Login a user (get API key)
POST /api/v1/shorten - Shorten a long URL
GET /api/v1/urls - List all URLs by the user
GET /api/v1/url/{shortUrl} - Redirect to long URL
### v2
POST /api/v2/register - Register a user
POST /api/v2/login - Login a user (get API key)
POST /api/v2/shorten - Shorten a long URL
GET /api/v2/urls - List all URLs by the user
GET /api/v2/url/{shortUrl} - Redirect to long URL
GET /api/v2/url/view/{id} - Get URL details with visit count
