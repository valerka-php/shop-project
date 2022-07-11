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
            $checked = Validator::validateData($_POST);
            $user = $this->model->checkUser($checked);
            var_dump($user);
            if ($user === true){
                $this->model->insertUserIntoTable($checked);
            }
        }

    }
}
