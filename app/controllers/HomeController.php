<?php

namespace App\Controller;

use App\Core\Render;

class HomeController
{
    public function indexAction(): void
    {
        $render = new Render();
        $params = ['test' => 'Helper'];
        $render->getRender('default', $params, 'product');
        echo 'Home controller index action';
    }

    public function testAction(): void
    {
        echo 'Home controller test action';
    }
}
