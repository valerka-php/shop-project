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
//        $list = require '../temp/inventory/product_list.php';
//        $model = new Product();
//        $model->addProducts($list);

        $this->getView('home');

    }

    public function testAction(): void
    {
        echo 'Home controller testController action';
//        Logger::log(LogLevel::NOTICE, "open testAction\r");
    }
}
