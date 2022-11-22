<?php

namespace Core\Controllers\Base;

use Core\Routing\Request;
use Core\Views\Base\View;

class Controller
{
    private View $view;
    protected Request $request;

    public function __construct()
    {
        $this->view = new View();
        $this->request = new Request();
    }


    public function render(string $template, array $params = [])
    {
        $this->view->render($template, $params);
    }

    public function redirect()
    {
        header('Location: http://reviews.loc/');
    }
}