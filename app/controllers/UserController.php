<?php

namespace App\controllers;

use App\models\Product;
use App\models\User;
use App\models\UserLogin;
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
            'title' => 'login'
        ];

        if (isset($_SESSION['user'])) {
            header("location:/user/profile/");
        }

        if (!empty($_POST)) {
            $checkUser = new UserLogin();
            $checked = $checkUser->checkUser($_POST['login'], $_POST['password']);

            if (is_array($checked)) {
                Session::set('user', $checked['login']);
                Session::set('userName', $checked['name']);
                header("location:/user/profile/");
            }
        }

        $this->getView('login', $params, 'user');
    }

    public function profileAction()
    {
        $params = [
            'name' => $_SESSION['userName'],
            'title' => 'profile'
        ];


        $this->getView('profile', $params, 'user');
    }
}
