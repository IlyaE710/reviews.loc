<?php

namespace Core\Views\Base;

class View
{
    public function render(string $template, array $params = [])
    {
        extract($params);
        ob_start();
        ob_implicit_flush(0);
        require_once TEMPLATES . "/" . $template . ".php";
        echo ob_get_clean();
    }
}