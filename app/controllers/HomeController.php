<?php

namespace App\controllers;

use App\models\Home;
use Framework\core\Controller;
use Framework\core\Db;
use Framework\helpers\Helper;
use Psr\Log\LogLevel;
use Framework\core\Logger;

class HomeController extends AppController
{

    public function indexAction(): void
    {
        $this->getView('product');
        echo 'Home controller index action';
        Logger::log(LogLevel::NOTICE, "open indexAction\r");

        $con = new Home();
        $data = $con->getOne();

        Helper::dd($data);

    }

    public function testAction(): void
    {
        echo 'Home controller test action';
        Logger::log(LogLevel::NOTICE, "open testAction\r");
    }
}
