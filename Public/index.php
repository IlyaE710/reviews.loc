<?php

use Core\Controllers\MainController;
use Core\Routing\Request;
use Core\Routing\Router;

require_once __DIR__ . "/../vendor/autoload.php";

$router = new Router();
$router->get('/', [MainController::class]);
$router->get('sf/sd', ["controller1", "action"]);
$router->post('sf/sd', ["controller1", "action"]);
try {
    $router->dispatch(new Request());
} catch (ErrorException $e) {
    die($e);
}