<?php

namespace Core\Controllers;

use Core\Controllers\Base\Controller;

class MainController extends Controller
{
    public function index()
    {
        $this->render("main");
    }
}