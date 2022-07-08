<?php

namespace Framework\core;

/**
 * @property object $pdo
 */
abstract class AbstractModel
{
    public function __construct(){
        $this->pdo = Db::getInstance();
    }

    public function getData($query)
    {
        return $this->pdo->query($query);
    }
}