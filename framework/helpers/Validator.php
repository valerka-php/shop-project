<?php

namespace Framework\helpers;

class Validator
{

    public static function validateData(array $data = []): array
    {
        $result = [];
        foreach ($data as $key => $value) {
            $result[$key] = trim(htmlspecialchars($value));
        }

        if (key_exists('password',$result)){
            self::validatePassword($result['password'],$result['confirmPassword']);
            $result['password'] = md5($result['password']);
        }

        return $result;
    }

    public static function validatePassword(string $pass, string $confirmPass): string|bool
    {
        if (strlen($pass) < 6) {
            Session::set('message', 'Your password must be more 6 chars');
            header('location: /user/registration');
            exit();
        } elseif ($pass != $confirmPass) {
            Session::set('message', 'Your passwords don`t match');
            header('location: /user/registration');
            exit();
        } else {
            return true;
        }
    }


}