<?php

namespace App\controllers;

use App\models\Home;
use Framework\helpers\Helper;
use Psr\Log\LogLevel;
use Framework\core\Logger;

class HomeController extends AppController
{
    private Home $model;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Home();
    }

    public function indexAction(): void
    {
        $this->getView('product');

        $all = $this->model->getAll('users');
        var_dump($all);
//        Helper::dd($all);
//        Logger::log(LogLevel::NOTICE, "open indexAction\r");
    }

    public function testAction(): void
    {
        echo 'Home controller test action';
        Logger::log(LogLevel::NOTICE, "open testAction\r");
    }
}
