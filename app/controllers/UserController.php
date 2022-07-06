<?php

namespace App\controller;

use Framework\core\Controller;
//use Framework\core\Logger;
//use Psr\Log\LogLevel;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class UserController extends Controller
{
    public string $layout = 'base' ;
    public function loginAction($view, $params = [])
    {
        $this->getView($view, $this->layout);
//        Logger::log(LogLevel::NOTICE, "open loginAction\r");
        $log = new Logger('Open page');
        $log->pushHandler(new StreamHandler('../src/logs/log.txt', Level::Notice));
        $log->notice('Login Action');

    }
}
