<?php

namespace Framework\helpers;

class Helper
{
    public static function dd($arr)
    {
        echo '<pre>';
        var_dump($arr);
        echo '</pre>';
        exit;
    }

    public static function filterDataInArray($array, $params = [])
    {
        $count = 0;
        $result = [];

        foreach ($array as $item => $value) {
            if ($count < count($params) && $item === $params[$count]) {
                $result[$item] = $value;
                $count++;
            }
        }

        return $result;
    }
}
