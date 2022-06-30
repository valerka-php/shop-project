<?php

ini_set('display_errors', 1);
error_reporting(E_ALL) ;

require_once '../framework/core/Autoloader.php';
use framework\helpers\Helper;


Autoloader::register();


$arr = [
    '123','333','444','3423'
];

Helper::dd($arr);


//
//var_dump($_SERVER['REQUEST_URI']);
//echo 'index.php';


//
//
//
//$obj = new Render();
//$products = include_once './../src/inventory/product_list.php';
//$params = ['productList' => $products];
//$obj->getRender('default',$params,'product');
