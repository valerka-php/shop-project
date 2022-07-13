<?php

namespace Framework\core;


class Db
{
    protected \PDO $pdo;
    protected static object $instance;

    protected function __construct()
    {
        $db = require_once '../app/config/configDb.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];

        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);

    }

    public static function getInstance(): object
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($requestSql): array
    {
        $prepare = $this->pdo->prepare($requestSql);
        if ($prepare->execute()) {
            return $prepare->fetchAll();
        }else{
           return $prepare->errorInfo();
        }
    }
}