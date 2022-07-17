<?php

namespace App\controllers;

class ProductController extends AppController
{
    public function indexAction($params)
    {
        $data = require_once '../temp/inventory/product_list.php';
        $type = mb_substr($params[0], 2);
        $result = [];
        foreach ($data as $k => $v) {
            if ($k == $type) {
                $result[] = $v;
            }
        }

        $params = [
            'product' => $result,
        ];

        $this->getView('products', $params);
    }
}