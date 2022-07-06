<?php

namespace App\controller;

use Framework\core\Controller;
use Psr\Log\LogLevel;
use Framework\core\Logger;

class HomeController extends Controller
{
    public string $view = 'product';
    public function indexAction(): void
    {
        $this->getView($this->view, $this->layout);
        echo 'Home controller index action';
        Logger::log(LogLevel::NOTICE, "open indexAction\r");
    }

    public function testAction(): void
    {
        echo 'Home controller test action';
        Logger::log(LogLevel::NOTICE, "open testAction\r");
    }
}
