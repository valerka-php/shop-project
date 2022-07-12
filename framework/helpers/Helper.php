<?php

namespace Framework\helpers;

class Helper
{
    public static function dd(array $arr)
    {
        echo '<pre>';
        var_dump($arr);
        echo '</pre>';
        exit;
    }

    public static function filterArray(array $array, array $params = []): array
    {
        $result = [];
        foreach ($params as $key) {
            foreach ($array as $k => $v) {
                if ($key === $k) {
                    $result[$k] = $v;
                }
            }
        }
        return $result;
    }
}
