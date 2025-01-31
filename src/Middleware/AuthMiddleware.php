<?php

namespace App\Middleware;

class AuthMiddleware
{
    public function handle($request)
    {
        // Start the session only if it hasn't been started yet
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $allowedRoutes = ['/login', '/logout'];

        if (! isset($_SESSION['user']) && ! in_array($request->path(), $allowedRoutes)) {
            header('Location: /login');
            exit;
        }
    }
}
