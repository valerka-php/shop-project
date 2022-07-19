<?php

namespace App\controllers;

use App\models\Account;
use App\models\AccountActivation;
use Framework\helpers\Helper;
use Framework\helpers\Validator;

class AccountController extends AppController
{
    private Account $model;

    public function __construct(string $route)
    {
        parent::__construct($route);
        $this->model = new Account();
    }

    public function indexAction()
    {

    }

    public function registrationAction()
    {
        $params = [
            'title' => 'registration'
        ];

        if (isset($_POST['submit'])) {
            $validatedData = Validator::validate($_POST, 'array');
            $arr = Helper::filterArray($validatedData, ['login', 'email', 'password']);
            $newUser = $this->model->checkUser($arr, 'users');
            if ($newUser === true) {
                $arr['vkey'] = $this->model->verifyKey;
                $this->model->insertIntoTable($arr, 'users');
                Helper::mail($arr['email'], $_POST['name'], $arr['vkey']);
                $this->getView('succes', $params, 'user');
            } else {
                header('location: /account/registration');
            }
        } else {
            $this->getView('registration', $params, 'user');
        }


    }

    public function activationAction($params)
    {
        $model = new AccountActivation();
        $confirmed = $model->activate(implode($params));
        if ($confirmed){
            $this->getView('activation', $params, 'user');
        }else{
            exit(require_once '404.php');
        }







    }

    public function succesAction($params)
    {

    }
}