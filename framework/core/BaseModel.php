<?php

namespace Framework\core;

use JetBrains\PhpStorm\ArrayShape;

/**
 * @property object $pdo
 */
class BaseModel
{
    public string $table;

    public function __construct(string $table = '')
    {
        $this->pdo = Db::getInstance();
        $this->table = $table;
    }

    public function getOneById(int $id): array
    {
        $request = "SELECT * FROM {$this->table} WHERE id={$id}";
        return $this->pdo->query($request);
    }

    public function getAll(): array
    {
        $request = "SELECT * FROM {$this->table}";
        return $this->pdo->query($request);
    }

    public function getValueByColumn(string $value,string $column): array
    {
        $request = "SELECT {$this->table}.{$column} FROM {$this->table} WHERE {$column}='{$value}'";
        return $this->pdo->query($request);
    }

    #[ArrayShape(['title' => "string", 'values' => "string"])]
    public function prepareValues(array $array): array
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