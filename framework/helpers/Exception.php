<?php

namespace Framework\helpers;

class Exception extends \Exception
{
    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}