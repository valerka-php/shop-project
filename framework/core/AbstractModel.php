<?php

namespace Framework\core;

/**
 * @property object $pdo
 */
abstract class AbstractModel
{
    public object $pdo;

    public function __construct(){
        $this->pdo = Db::getInstance();
    }

    public function getData($query)
    {
        return $this->pdo->query($query);
    }
}