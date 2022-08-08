<?php

namespace App\models;

use Framework\core\BaseModel;
use Framework\helpers\Session;

class Account extends BaseModel
{
    public string $verifyKey ;

    private static function setVerifyKey(string $user): string
    {
        return md5(time() . $user);
    }

    public function checkAccount(array $userData, string $table): bool|string
    {
        $login = $userData['login'];
        $email = $userData['email'];
        $request = "SELECT * FROM $table WHERE login='$login' OR email='$email'";
        $response = $this->connect->get($request);
        if (!empty($response)) {
            $result = $response[0];
            if ($login === $result['login']) {
                return Session::set('message', 'This login already exists');
            } elseif ($email === $result['email']) {
                return Session::set('message', 'This email already exists');
            }
        }

        $this->verifyKey = self::setVerifyKey($login);
        return true;
    }
}
