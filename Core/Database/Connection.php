<?php

namespace Core\Database;

use PDO;

//TODO Добавить файл конфигурации
class Connection
{
    private string $dsn = "mysql:host=localhost;dbname=reviewDB;charset=utf8";
    private array $option = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_STRINGIFY_FETCHES => false,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    public function get(): PDO
    {
        return new PDO($this->dsn, 'root', 'root', $this->option);
    }
}