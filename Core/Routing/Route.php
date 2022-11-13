<?php

namespace Core\Routing;

class Route
{
    public string $method;
    public string $uri;
    public array $callback;

    public function __construct(string $method, string $uri, array $callback)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->callback = $callback;
    }
}