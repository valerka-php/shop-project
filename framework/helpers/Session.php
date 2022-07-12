<?php

namespace Framework\helpers;

class Session
{
    public static function setSession(string $name, string $value): string
    {
        return $_SESSION[$name] = $value;
    }

    public static function showMessage(): void
    {
        if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
        }
        self::unset('message');
    }

    private static function unset(string $value): void
    {
        unset($_SESSION["$value"]);
    }

}