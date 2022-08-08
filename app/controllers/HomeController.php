<?php

namespace App\controllers;

use App\models\Product;

class HomeController extends AppController
{
    public function __construct($route)
    {
        parent::__construct($route);
    }

    public function indexAction(): void
    {
        # Adding products to database is described here.
//        $list = require '../temp/inventory/product_list.php';
//        $model = new Product();
//        $model->addProducts($list);

        $params = [
            'title' => 'Home page',
        ];

        $products = new Product();
        $category = $products->getCategory();
        $params['category'] = $category;

        $this->getView('home', $params);
    }
}
