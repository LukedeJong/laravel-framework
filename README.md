# My PHP Framework

A simple Laravel-like PHP framework for handling routes, middleware, authentication, and HTTP requests.

## Features

✅ Routing: Supports GET and POST requests.

✅ Middleware Support: Apply global or per-route middleware.

✅ Basic Authentication: Simple session-based login and logout.

✅ Request & Response Handling: Processes incoming requests and sends responses.

✅ Dependency Injection: Basic container for managing dependencies.

✅ Minimal MVC Structure: Follows a structured approach for better maintainability.

## Installation

Clone the repository:

git clone https://github.com/LukedeJong/my-php-framework.git
cd my-php-framework

Install dependencies using Composer:

composer install

Start the development server:

php -S localhost:8000 -t public

## Usage

Defining Routes

Routes are defined inside routes/web.php:

```php
$router->get('/', function () {
    return new \App\Http\Response("Welcome to My PHP Framework");
});

$router->post('/login', function () {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $\_SESSION['user'] = $\_POST['username'] ?? 'Guest';
    return new \App\Http\Response("Logged in as " . $\_SESSION['user']);
});
```

## Authentication & Middleware

Middleware can be applied globally in Kernel.php or per route.

Example of requiring authentication for a route:

```php
use App\Middleware\AuthMiddleware;

$router->get('/dashboard', function () {
    return new \App\Http\Response("Welcome to your dashboard!");
}, [AuthMiddleware::class]);
```

## Available Middleware

TrimStrings: Trims input data from requests.

AuthMiddleware: Redirects users to /login if they are not authenticated.

## Authentication

Login

Visit /login and submit a username. This stores the user in $\_SESSION.

Logout

Visit /logout to clear the session and log out.

## Future Enhancements

✅ Database ORM (like Eloquent)

✅ Template Engine (like Blade)

✅ Error Handling & Logging

✅ CLI Commands (like Artisan)
