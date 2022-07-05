<?php

namespace App\Core;

abstract class Controller
{
    public string $layout = 'default' ;
    public string $view ;
    public array $params = [];

    public function getView(string $layout, array $params, string $view): void
    {
        $render = new Render();
        $render->getRender($this->layout, $params, $this->view);
    }
}
