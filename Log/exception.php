<?php

//error_reporting(E_ALL);


class CheckVar extends Exception {
    public function msgError()
    {
        echo 'This is not string' . $this->getMessage();
    }

    public function lineError()
    {
        echo 'On line '. '<b>' .  $this->getLine() .  '</b>';
    }

}


$str = 'qwerty';
//$str = 124;
//$str = false;
//$str = [];


function checkStr($var){
    if(!is_string($var)){
        throw new checkVar();
    }
}


try {
    checkStr($str);
} catch (checkVar $exception){
    echo $exception->msgError(). '<br>';
    echo $exception->lineError(). '<br>';
} finally {
    echo 'Variable checked =)';
}
