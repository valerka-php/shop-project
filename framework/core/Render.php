<?php

namespace Framework\core;

class Render
{
    public static function run(string $view, string $layout, string $folderView, array $params): bool
    {
        $layout = './../app/views/layouts/' . $layout . '.php';
        $view = './../app/views/' . ucfirst($folderView) . '/' . $view . '.php';

        if (!empty($params)) {
            extract($params);
        }

        if (file_exists($layout)) {
            ob_start();
            include_once $layout;
            include_once $view;
        }
        return ob_get_flush();
    }
}
