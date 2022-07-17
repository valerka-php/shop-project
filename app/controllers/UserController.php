<?php

namespace App\controllers;

use App\models\User;
use Framework\helpers\Helper;
use Framework\helpers\Session;
use Framework\helpers\Validator;

class UserController extends AppController
{
    private User $model;

    public function __construct(string $route)
    {
        parent::__construct($route);
        $this->model = new User();
    }

    public function loginAction()
    {
        $params = [
            'test' => 'qwerty',
            'test2' => '123',
            'title' => 'login'
        ];
        $this->getView('login', $params ,'user');
//        Logger::log(LogLevel::NOTICE, "open loginAction\r");
    }

}
