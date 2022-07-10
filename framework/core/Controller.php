<?php

namespace Framework\core;
use Framework\core\BaseModel;

abstract class Controller
{
    public string $layout = 'default' ;
    public string $folderView = '';

    public function __construct($route)
    {
        $this->folderView = $route;
    }

    public function getView(string $view, array $params = []): void
    {
        Render::run($view, $this->layout , $this->folderView , $params );
    }
}
