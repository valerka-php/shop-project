<?php

namespace App\controllers;

use App\models\User;
use Framework\core\Logger;
use Framework\helpers\Helper;
use Framework\helpers\Validator;
use Psr\Log\LogLevel;

class UserController extends AppController
{
    public string $layout = 'user';
    private User $model;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new User('users');
    }

    public function loginAction()
    {
        $params = [
            'test' => 'qwerty',
            'test2' => '123',
            'title' => 'login'
        ];
        $this->getView('login', $params);
        Logger::log(LogLevel::NOTICE, "open loginAction\r");
    }

    public function registrationAction()
    {
        $params = [
            'title' => 'login'
        ];
        $this->getView('registration', $params);

        if (isset($_POST) && !empty($_POST['login'])) {
            $checked = Validator::checkData($_POST);
//            $this->model->insertUserIntoTable($checked);
            $user = $this->model->checkUser($_POST['login']);
            var_dump($user);


        } else {
            echo 'empty  post';
        }


    }
}
