<?php

namespace Framework\helpers;

class Validator
{
    public static function validateData($data = [])
    {
        if (!empty($data)) {
            $result = [];
            foreach ($data as $key => $value) {
                $result[$key] = trim(htmlspecialchars($value));
            }
            return $result;
        }
    }

    public function validatePassword()
    {

    }
}