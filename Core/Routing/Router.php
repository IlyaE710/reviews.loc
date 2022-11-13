<?php

namespace Core\Routing;

class Router
{
    private array $routes;
    private const GET = "GET";
    private const POST = "POST";

    public function get(string $uri, array $callback) : void
    {
        $this->addRoute(self::GET, $uri, $callback);
    }

    public function post(string $uri, array $callback) : void
    {
        $this->addRoute(self::POST, $uri, $callback);
    }

    private function addRoute(string $method, string $uri, array $callback)
    {
        $this->routes[$method . "@" . $uri] = new Route($method, $uri, $callback);
    }

    public function dispatch() : void
    {
        print_r($this->routes);
    }
}