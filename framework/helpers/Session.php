<?php

namespace Framework\helpers;

class Session
{


    public static function setSession($name,$value)
    {
        session_start();
        return $_SESSION[$name] = $value;
    }


}