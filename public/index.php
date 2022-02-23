<?php
error_reporting(E_ALL) ;

spl_autoload_register(function ($className) {
    include_once "../src/classes/" . $className . ".php";
});


$obj = new Render();
$products = include_once './../src/inventory/product_list.php';
$params = ['productList' => $products];
$obj->getRender('default',$params,'product');