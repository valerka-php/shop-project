<?php

namespace Framework\core;


abstract class Controller
{
    public string $folderView = '';

    public function __construct(string $route)
    {
        $this->folderView = $route;
    }

    public function getView(string $view, array $params = [],string $layout = 'default' ): bool
    {
       return Render::run($view, $layout, $this->folderView, $params);
    }
}
