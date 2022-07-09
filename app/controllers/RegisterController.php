<?php

namespace App\controllers;

use Framework\helpers\Helper;

class RegisterController extends AppController
{
    public string $layout = 'user';

    public function indexAction()
    {
        $this->getView('index');
    }
}