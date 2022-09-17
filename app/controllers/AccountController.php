<?php

namespace App\controllers;

use App\models\Account;
use App\models\AccountActivation;
use Framework\helpers\Helper;
use Framework\helpers\Mailer;
use Framework\helpers\Validator;
use Valerjan\log\LogLevel;
use Valerjan\Logger;

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
            $accountData = Helper::filterArray($validatedData, ['login', 'email', 'password']);
            $userData = [
                'name' => $validatedData['name'],
                'surname' => $validatedData['surname']
            ];
            $newUser = $this->model->checkAccount($accountData, 'users');
            if ($newUser === true) {
                $accountData['vkey'] = $this->model->verifyKey;
                $this->model->insertIntoTable($accountData, 'users');
                $this->model->insertIntoTable($userData, 'users_data');
                Mailer::confirmationEmail($accountData['email'], $validatedData['name'], $accountData['vkey']);
                header('location: /account/success');
            } else {
                header('location: /account/registration');
            }
        } else {
            $this->getView('registration', $params, 'user');
        }
    }

    public function activationAction()
    {
        $params = [
          'title' => 'Activation'
        ];

        $code = $_GET['code'];
        $model = new AccountActivation();
        $confirmed = $model->activate($code);
        if ($confirmed) {
            $this->getView('activation', $params, 'user');
        } else {
            require_once '404.php';
        }
    }

    public function successAction()
    {
        $params = [
          'title' => 'success',
        ];

        $this->getView('success', $params);
    }
}
