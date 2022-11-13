<?php

namespace Core\Models\base;

use Core\Database\Connection;
use PDO;

class Model
{
    protected PDO $connection;

    public function __construct()
    {
        $connection = new Connection();
        $this->connection = $connection->get();
    }
}