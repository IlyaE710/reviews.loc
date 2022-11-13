<?php

namespace Core\Routing;

class Request
{
    public string $method;
    public array $uri;
    public string $path;
    public array $params;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = parse_url($_SERVER['REQUEST_URI']);
        $this->path = $this->uri['path'];
        $this->params = $this->parseQuery();
    }

    private function parseQuery(): array
    {
        $query = $this->uri['query'];
        $queries = explode('&', $query);
        if (empty($queries))
        {
            return [];
        }
        $params = [];
        foreach ($queries as $query) {
            [$k, $v] = (explode('=', $query));
            $params[$k] = $v;
        }
        return $params;
    }

    public function isPost(): bool
    {
        return $this->method === "POST";
    }
}