<?php

ini_set('display_errors', 1);
error_reporting(E_ALL) ;


require_once '../vendor/autoload.php';

use App\Core\Router;
use App\Core\Render;

$obj = new Render();
$obj->test();

Router::run($_SERVER['REQUEST_URI']);
