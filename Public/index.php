<?php

use Core\Controllers\MainController;
use Core\Routing\Request;
use Core\Routing\Router;

require_once __DIR__ . "/../vendor/autoload.php";
const TEMPLATES = __DIR__ . "/../Templates";

$router = new Router();
$router->get('/', [MainController::class]);
$router->post('/action', [MainController::class, "action"]);
try {
    $router->dispatch(new Request());
} catch (ErrorException $e) {
    die($e);
}