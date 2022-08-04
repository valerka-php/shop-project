<?php

namespace App\controllers;

use App\models\Home;
use App\models\Product;
use Framework\helpers\Helper;
use Framework\helpers\Session;

class ProductController extends AppController
{
    private Product $model;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Product();
    }

    public function indexAction()
    {
        $params = [
            'title' => $_GET['type'],
        ];

        $this->getView('products', $params);
    }
}
