<?php

namespace App\controllers;

use Framework\core\Controller;
use Framework\core\Logger;
use Psr\Log\LogLevel;

class UserController extends Controller
{
    public string $layout = 'user' ;

    public function loginAction($view)
    {

        $this->getView($view,['title' => 'login']);
        $test = 'test from user login';

        Logger::log(LogLevel::NOTICE, "open loginAction\r");
    }
}
