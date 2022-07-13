<?php

namespace Framework\core;


use JetBrains\PhpStorm\ArrayShape;


class Db
{
    public \PDO $pdo;
    protected static object $instance;

    private function __construct()
    {
        $db = require_once '../app/config/configDb.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];

        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);

    }

    private function __clone()
    {

    }


    public static function getInstance(): object
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function insert(array $data, string $table): void
    {
        $array = $this->prepareValues($data);
        $column = $array['title'];
        $value = $array['values'];
        $request = "INSERT INTO $table ($column) VALUES ($value)";
        $this->pdo->query($request);

    }

    public function send($requestSql): array
    {
        $prepare = $this->pdo->prepare($requestSql);
        $result = $prepare->execute();
        if ($result !== false) {
            return $prepare->fetchAll();
        }
        return [];
    }

    public function query($request)
    {
        $prepare = $this->pdo->prepare($request);
        $result = $prepare->execute();
        var_dump($result);


        if ($result !== false) {
            return $prepare->fetchAll();
        }

    }

}