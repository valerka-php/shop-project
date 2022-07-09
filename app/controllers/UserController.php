<?php

namespace App\controllers;

use Framework\core\Logger;
use Psr\Log\LogLevel;

class UserController extends AppController
{
    public string $layout = 'user' ;

    public function loginAction()
    {
        $data = ['test' => 'qwerty','test2' => '123','title' => 'login'];
        $this->getView('login',$data);
        Logger::log(LogLevel::NOTICE, "open loginAction\r");
    }
}
