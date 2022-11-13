<?php

namespace Core\Controllers\Base;

use Core\Views\Base\View;

class Controller
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }


    public function render(string $template, array $params = [])
    {
        $this->view->render($template, $params);
    }
}