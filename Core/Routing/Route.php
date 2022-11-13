<?php

namespace Core\Routing;

class Route
{
    public string $method;
    public string $path;
    public array $callback;

    public function __construct(string $method, string $path, array $callback)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
    }
}