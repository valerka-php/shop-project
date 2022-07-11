<?php

namespace Framework\core;

use JetBrains\PhpStorm\ArrayShape;

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
        $request = "SELECT * FROM {$this->table} WHERE id={$id}";
        return $this->pdo->query($request);
    }

    public function getAll()
    {
        $request = "SELECT * FROM {$this->table}";
        return $this->pdo->query($request);
    }

    public function getValueByColumn($value, $column)
    {
        $request = "SELECT {$this->table}.{$column} FROM {$this->table} WHERE {$column}='{$value}'";
        return $this->pdo->query($request);
    }

    #[ArrayShape(['title' => "string", 'values' => "string"])]
    public function prepareValues($array): array
    {
        $column = '';
        $value = '';
        if (!empty($array)) {
            foreach ($array as $k => $v) {
                $column .= "`" . $k . "`,";
                $value .= "'" . $v . "',";
            }
        }
        $preparedColumn = substr($column, 0, -1);
        $preparedValues = substr($value, 0, -1);

        return [
            'title' => $preparedColumn,
            'values' => $preparedValues
        ];
    }

}