<?php

namespace Framework\core;

class Render
{
    public function getRender(string $view, string $layout, array $params): bool|string
    {
        $layout = './../app/views/layouts/' . $layout . '.php';
        $view = './../app/views/' . $view . '.php';

        if (!empty($params)){
            extract($params);
        }

        if (file_exists($layout)) {
            ob_start();
            include_once $layout;
            include_once $view;
            $content = ob_end_flush();
        } else {
            $content = '';
        }

        return $content;
    }
}
