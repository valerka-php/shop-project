<?php

namespace App\controllers;

use App\models\Home;
use Valerjan\Logger;
use Framework\helpers\Helper;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class HomeController extends AppController
{
    private Home $model;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Home();
    }

    public function indexAction($params): void
    {
        var_dump($params);

        $this->getView('product');

//        Helper::mail();

//        $data = $this->model->getAll('users');
//        var_dump($data);
//

//        Helper::dd($all);
//        Logger::log(LogLevel::NOTICE, "open indexAction\r");
    }

    public function testAction(): void
    {
        echo 'Home controller test action';
//        Logger::log(LogLevel::NOTICE, "open testAction\r");
    }
}
