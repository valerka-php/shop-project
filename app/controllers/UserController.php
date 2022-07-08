<?php

namespace App\controllers;

use Framework\core\Controller;
use Framework\core\Logger;
use Psr\Log\LogLevel;

class UserController extends Controller
{
    public string $layout = 'base' ;

    public function loginAction($view)
    {
        $this->getView($view);
        Logger::log(LogLevel::NOTICE, "open loginAction\r");
    }
}
