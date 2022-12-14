<?php

use Core\Controllers\MainController;
use Core\Routing\Request;
use Core\Routing\Router;

require_once __DIR__ . "/../vendor/autoload.php";
const TEMPLATES = __DIR__ . "/../Templates";
const DB = __DIR__ . "/../Core/Config/db_config.php";

$router = new Router();
$router->get('/', [MainController::class]);
$router->post('/addFeedback', [MainController::class, "addFeedback"]);
try {
    $router->dispatch(new Request());
} catch (ErrorException $e) {
    die($e);
}