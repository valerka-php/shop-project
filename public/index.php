<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require_once '../vendor/autoload.php';

use Framework\core\Router;

Router::run($_SERVER['REQUEST_URI']);
