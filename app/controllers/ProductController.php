<?php

namespace App\controllers;

use App\models\Home;
use App\models\Product;

class ProductController extends AppController
{
    private Product $model;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Product();
    }

    public function indexAction($type)
    {
        $params = [];
        file_put_contents('api/product', json_encode($this->model->getProducts($type[0])));
        $this->getView('products', $params, 'product');
    }
}