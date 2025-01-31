<?php

use App\Http\Response;
use App\Middleware\AuthMiddleware;

$router->get('/', function () {
    return new Response('Welcome to My PHP Framework');
});

$router->get('/dashboard', function () {
    return new Response('Welcome to your dashboard!');
}, [AuthMiddleware::class]);

$router->get('/login', function () {
    return new Response('<form method="POST" action="/login">
                            <input type="text" name="username" placeholder="Enter Username" required>
                            <button type="submit">Login</button>
                         </form>');
});

$router->post('/login', function () {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Simple authentication (no password for now)
    $_SESSION['user'] = $_POST['username'] ?? 'Guest';

    return new Response('Logged in as '.$_SESSION['user']);
});

$router->get('/logout', function () {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    session_destroy();

    return new Response('Logged out successfully!');
});
