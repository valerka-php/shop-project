<?php

namespace App\controllers;

use Framework\core\Controller;

class RegisterController extends Controller
{
    public string $layout = 'user';

    public function indexAction(){
        $this->getView('register',['title' => 'register']);
//        var_dump($_POST);
    }
}