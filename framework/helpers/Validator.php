<?php

namespace Framework\helpers;

class Validator
{
    public static function validate(mixed $data, string $type): string|array|bool
    {
        switch ($type) {
            case 'array':
                $result = [];
                foreach ($data as $key => $value) {
                    $result[$key] = trim(htmlspecialchars($value));
                }

                if (key_exists('password', $result)) {
                    self::validatePassword($result['password'], $result['confirmPassword']);
                    $result['password'] = password_hash($result['password'], PASSWORD_DEFAULT);
                }
                return $result;
            case 'string':
                return trim(htmlspecialchars($data));
            default:
                return false;
        }
    }

    private static function validatePassword(string $pass, string $confirmPass): string|bool
    {
        if (strlen($pass) < 6) {
            Session::set('message', 'Your password must be more 6 chars');
            header('location: /account/registration');
            exit();
        } elseif ($pass != $confirmPass) {
            Session::set('message', 'Your passwords doesn`t match');
            header('location: /account/registration');
            exit();
        } else {
            return true;
        }
    }
}
