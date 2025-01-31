<?php

namespace App\Http;

class Router
{
    protected $routes = [];

    protected $middlewares = [];

    public function get($uri, $callback, $middleware = [])
    {
        $this->routes['GET'][$uri] = $callback;
        $this->middlewares['GET'][$uri] = $middleware;
    }

    public function post($uri, $callback, $middleware = [])
    {
        $this->routes['POST'][$uri] = $callback;
        $this->middlewares['POST'][$uri] = $middleware;
    }

    public function dispatch(Request $request)
    {
        $method = $request->method();
        $uri = $request->path();

        if (! isset($this->routes[$method][$uri])) {
            return new Response('404 Not Found', 404);
        }

        // Run middleware before executing route
        foreach ($this->middlewares[$method][$uri] ?? [] as $middleware) {
            (new $middleware)->handle($request);
        }

        return call_user_func($this->routes[$method][$uri]);
    }
}
