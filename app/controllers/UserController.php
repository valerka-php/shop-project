<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\Logger;
use Psr\Log\LogLevel;

class UserController extends Controller
{
    public string $layout = 'base' ;
    public function loginAction($view, $params = [])
    {
        $this->getView($view, $this->layout);
        Logger::log(LogLevel::NOTICE, "open loginAction\r");
    }
}
