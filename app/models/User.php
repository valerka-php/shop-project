<?php

namespace App\models;

use Framework\core\AbstractModel;
use Framework\helpers\Session;

class User extends AbstractModel
{
    public function checkUser(array $userData, string $table): bool|string
    {
        $login = $userData['login'];
        $email = $userData['email'];
        $request = "SELECT * FROM $table WHERE login='$login' OR email='$email'";
        $response = $this->connect->get($request);
        if (!empty($response)) {
            $result = $response[0];
            if ($login === $result['login']) {
                return Session::set('message', 'This login already exist');
            } elseif ($email === $result['email']) {
                return Session::set('message', 'This email already exist');
            }
        }
        return true;
    }
}