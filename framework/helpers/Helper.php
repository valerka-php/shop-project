<?php

namespace Framework\helpers;

use JetBrains\PhpStorm\NoReturn;

class Helper
{
    #[NoReturn] public static function dd(array $arr): void
    {
        echo '<pre>';
        var_dump($arr);
        echo '</pre>';
        exit;
    }

    /**
     * @param array $array Array which you need filtered
     * @param array $params Array params for search
     * When match is found in array will be added to result array
     * @return array Result
     */

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
