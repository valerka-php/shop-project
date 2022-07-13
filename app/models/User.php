<?php

namespace App\models;

use Framework\core\BaseModel;
use Framework\helpers\Session;

class User extends BaseModel
{
    public function checkUser(array $userData, string $table): bool|string
    {
        $login = $userData['login'];
        $email = $userData['email'];
        $request = "SELECT * FROM $table WHERE login='$login' OR email='$email'";
        $response = $this->con->select($request);
        if ($response) {
            $result = $response[0];
            if ($login === $result['login']) {
               return Session::setSession('message','This login already exist');
            } elseif ($email === $result['email']) {
               return Session::setSession('message','This email already exist');
            }
        }
        return true;
    }
}