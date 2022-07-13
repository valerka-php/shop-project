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

    /** @noinspection PhpInconsistentReturnPointsInspection */
    public function select($request): bool|array
    {
        $prepare = $this->pdo->prepare($request);
        try {
            if ($prepare->execute()) {
                return $prepare->fetchAll();
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /** @noinspection PhpInconsistentReturnPointsInspection */
    public function insert($request): bool
    {
        $prepare = $this->pdo->prepare($request);
        try {
            if ($prepare->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

}