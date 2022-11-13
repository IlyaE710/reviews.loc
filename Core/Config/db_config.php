<?php
return [
    "dsn" => "mysql:host=localhost;dbname=reviewDB;charset=utf8",
    "username" => "root",
    "password" => "root",
    "option" => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_STRINGIFY_FETCHES => false,
        PDO::ATTR_EMULATE_PREPARES => false,
    ],
];
