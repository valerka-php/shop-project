<?php

namespace App\Core;

class Render
{
    public function getRender(string $view, string $layout, array $params): bool|string
    {
        $layout = './../app/views/layouts/' . $layout . '.php';
        $view = './../app/views/' . $view . '.php';
        extract($params);
        if (file_exists($layout)) {
            ob_start();
            include_once $layout;
            include_once $view;
            $render = ob_end_flush();
        } else {
            $render = '';
        }
        return $render;
    }
}
