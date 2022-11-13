<?php

namespace Core\Database;

use PDO;

class Connection
{
    private string $dsn;
    private string $username;
    private string $password;
    private array $option;

    public function __construct()
    {
        $config = include_once DB;
        $this->dsn = $config["dsn"];
        $this->username = $config["username"];
        $this->password = $config["password"];

        $this->option = $config["option"];;
    }

    public function get(): PDO
    {
        return new PDO($this->dsn, $this->username, $this->password, $this->option);
    }
}