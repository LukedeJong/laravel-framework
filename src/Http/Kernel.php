<?php

namespace App\Http;

class Kernel
{
    protected $router;

    protected $middleware = [
        \App\Middleware\TrimStrings::class,
        \App\Middleware\AuthMiddleware::class,
    ];

    public function __construct()
    {
        $this->router = new Router;
        $this->loadRoutes();
    }

    protected function loadRoutes()
    {
        $router = $this->router;
        require_once __DIR__.'/../../routes/web.php';
    }

    public function handle(Request $request)
    {
        // Run Middleware
        foreach ($this->middleware as $middleware) {
            (new $middleware)->handle($request);
        }

        return $this->router->dispatch($request);
    }
}
