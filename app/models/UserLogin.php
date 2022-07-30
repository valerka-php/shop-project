<?php

namespace App\models;

use Framework\helpers\Session;

class UserLogin extends User
{
    public function checkUser(string $login, string $password): string|array
    {
        $sql = "
            SELECT users.login,users.password,users.verified,users_data.name
            FROM users
            INNER JOIN users_data ON users_data.id = users.id 
           ";

        $user = $this->connect->get($sql);

        if (!$user) {
            return Session::set('message', 'Incorrect login or password');
        }

        $verifyPass = password_verify($password, $user[0]['password']);

        if ($user[0]['verified'] === 0 || !$verifyPass) {
            return Session::set('message', 'Incorrect login or password');
        }

        return $user[0];
    }
}