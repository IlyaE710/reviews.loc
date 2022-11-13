<?php

use Core\Routing\Router;

require_once __DIR__ . "/../vendor/autoload.php";

$router = new Router();
$router->get('/', ["controller", "action"]);
$router->get('sf/sd', ["controller1", "action"]);
$router->post('sf/sd', ["controller1", "action"]);
$router->dispatch();