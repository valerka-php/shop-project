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

    public function indexAction($params): void
    {
        $this->getView('product');


        # add products into db
//        $product = new Product();
//        $list = require '../temp/inventory/product_list.php';
//        $product->addProduct($list);


    }

    public function testAction(): void
    {
        echo 'Home controller test action';
//        Logger::log(LogLevel::NOTICE, "open testAction\r");
    }
}
