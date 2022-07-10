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
//        Logger::log(LogLevel::NOTICE, "open indexAction\r");

//        $data = $this->model->getValueByColumn('lotr','title');

        $arr = [
            'login' => 'qwert',
            'email' => 'test',
            'password' => 'parerrd'
        ];

        $this->model->insertIntoTable('users',$arr);
//        Helper::dd($data);

    }

    public function testAction(): void
    {
        echo 'Home controller test action';
        Logger::log(LogLevel::NOTICE, "open testAction\r");
    }
}
