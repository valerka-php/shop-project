<?php

namespace Framework\core;

abstract class Controller
{
    public string $layout = 'default' ;
    public function getView(string $view, string $layout, array $params = []): void
    {
        $render = new Render();
        $render->getRender($view, $this->layout, $params);
    }
}
