<?php

namespace Framework\core;

use JetBrains\PhpStorm\ArrayShape;

class BaseModel
{
    public object $con;

    public function __construct()
    {
        $this->con = Db::getInstance();
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

    public function getOneById(int $id): array
    {
        $request = "SELECT * FROM {$this->table} WHERE id={$id}";
        return $this->con->query($request);
    }

    public function getAll($table)
    {
        $sql = "SELECT * FROM {$table}";
        return $this->con->query($sql);
    }


    public function getValueByColumn(string $value, string $column): array
    {
        $request = "SELECT {$this->table}.{$column} FROM {$this->table} WHERE {$column}='{$value}'";
        return $this->con->query($request);
    }

    public function insert(array $data, string $table): void
    {
        $array = $this->prepareValues($data);
        $column = $array['title'];
        $value = $array['values'];
        $request = "INSERT INTO $table ($column) VALUES ($value)";
        $this->con->query($request);

    }

}