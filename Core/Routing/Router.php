<?php

namespace Core\Routing;

use mysql_xdevapi\Exception;

class Router
{
    private const CLASS_NAME = 0;
    private const METHOD_NAME = 1;
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

    /**
     * @throws \ErrorException
     */
    private function getCallback(Request $request)
    {
        foreach ($this->routes as $route)
        {
            if ($route->path === $request->path && $request->method === $route->method)
            {
                return  $route->callback;
            }
        }

        //TODO перенести установку хедера
        header("HTTP/1.1 404 Not Found");
        throw new \ErrorException("Страница не найдена", 404);
    }

    /**
     * @throws \ErrorException
     */
    public function dispatch(Request $request) : void
    {
        $callback = $this->getCallback($request);
        $class = $callback[self::CLASS_NAME];
        $method = $callback[self::METHOD_NAME] ?? "index";

        if (!class_exists($class))
        {
            throw new \ErrorException("Класса не сушествует");
        }
        if (!method_exists($class, $method))
        {
            throw new \ErrorException("Метода не сушествует");
        }
        $params = $request->params;
        (new $class)->$method(['id' => 1]);
    }

}