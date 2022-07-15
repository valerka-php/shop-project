<?php

namespace Framework\core;

use Valerjan\Logger;
use Valerjan\log\LogLevel;

class Db
{
    protected \PDO $pdo;
    public object $instance;
    public string $dsn,$user,$pass;

    public function __construct()
    {
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];

        $this->setConfig();
        $this->pdo = new \PDO("$this->dsn", "$this->user", "$this->pass", $options);

    }

    public function setConfig(): void
    {
        $config = require '../app/config/configDb.php';

        $this->dsn = $config['dsn'];
        $this->user = $config['user'];
        $this->pass = $config['pass'];

    }

    public function getInstance(): object
    {
        if (empty($this->instance)) {
            $this->instance = new self();
        }
        return $this->instance;
    }

    /** @noinspection PhpInconsistentReturnPointsInspection */
    public function get($request): bool|array
    {
        $prepare = $this->pdo->prepare($request);
        try {
            if ($prepare->execute()) {
                return $prepare->fetchAll();
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            $line = $e->getLine();
            $file = $e->getFile();
//            Logger::log(LogLevel::ERROR,"$msg","$line","$file",'databaseLog.txt');
            Logger::log(LogLevel::ERROR,"$msg","$line","$file",'databaseLog.txt');
            return false;
        }
    }

    /** @noinspection PhpInconsistentReturnPointsInspection */
    public function send($request): bool
    {
        $prepare = $this->pdo->prepare($request);
        try {
            if ($prepare->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            $line = $e->getLine();
            Logger::log(LogLevel::ERROR,"$msg","$line",'databaseLog.txt');
            return false;
        }
    }

}