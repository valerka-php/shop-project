<?php

namespace Framework\core;


abstract class Controller
{
    public string $layout = 'default';
    public string $folderView = '';

    public function __construct($route)
    {
        $this->folderView = $route;
    }

    public function getView(string $view, array $params = []): bool
    {
       return Render::run($view, $this->layout, $this->folderView, $params);
    }
}
