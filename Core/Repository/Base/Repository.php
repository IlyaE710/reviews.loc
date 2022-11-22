<?php

namespace Core\Repository\Base;

use Core\Database\Connection;
use Core\Models\base\Model;
use PDO;

abstract class Repository
{
    protected PDO $connection;

    public function __construct()
    {
        $connection = new Connection();
        $this->connection = $connection->get();
    }

    abstract function save($model);
    abstract function getAll();
}