<?php

namespace App\controllers;

use App\models\User;
use Framework\core\Logger;
use Framework\helpers\Helper;
use Framework\helpers\Session;
use Framework\helpers\Validator;
use Psr\Log\LogLevel;

class UserController extends AppController
{
    public string $layout = 'user';
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
        $this->getView('login', $params);
//        Logger::log(LogLevel::NOTICE, "open loginAction\r");
    }

    public function registrationAction()
    {
        $params = [
            'title' => 'registration'
        ];
        $this->getView('registration', $params);

        if (isset($_POST['submit'])) {
            $validatedData = Validator::validateData($_POST);
            $arr = Helper::filterArray($validatedData, ['login', 'email', 'password']);
            $newUser = $this->model->checkUser($arr, 'users');

            if ($newUser === true) {
                $this->model->insertIntoTable($arr, 'users');
                Session::set('message', 'User has been created');
                header('location: /user/login');
            } else {
                header('location: /user/registration');
            }
        }


    }
}
