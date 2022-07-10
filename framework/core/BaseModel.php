<?php

namespace Framework\core;

/**
 * @property object $pdo
 */
class BaseModel
{
    public string $table;

    public function __construct($table = '')
    {
        $this->pdo = Db::getInstance();
        $this->table = $table;
    }

    public function getOneById($id)
    {
        $response = "SELECT * FROM {$this->table} WHERE id={$id}";
        return $this->pdo->query($response);
    }

    public function getAll()
    {
        $response = "SELECT * FROM {$this->table}";
        return $this->pdo->query($response);
    }

    public function getValueByColumn($value, $column)
    {
        $response = "SELECT {$this->table}.{$column} FROM {$this->table} WHERE {$column}='{$value}'";
        return $this->pdo->query($response);
    }



}