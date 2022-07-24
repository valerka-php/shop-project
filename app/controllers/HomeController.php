<?php

namespace App\controllers;

use App\models\Home;
use App\models\Product;
use Framework\helpers\Helper;

class HomeController extends AppController
{
    private Home $model;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Home();
    }

    public function indexAction(): void
    {
        $this->getView('product');

    }

    public function testAction(): void
    {
        echo 'Home controller testController action';
//        Logger::log(LogLevel::NOTICE, "open testAction\r");
    }
}
