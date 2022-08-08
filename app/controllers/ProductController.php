<?php

namespace App\controllers;

use App\models\Product;

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

        $category = $this->model->getCategory();
        $params['category'] = $category;

        $this->getView('products', $params);
    }
}
