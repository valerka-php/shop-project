<?php

namespace Framework\core;

use JetBrains\PhpStorm\ArrayShape;

abstract class AbstractModel
{
    public object $connect;

    public function __construct()
    {
        $db = new Db();
        $this->connect = $db->getInstance();
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
        $request = "SELECT * FROM $this->table WHERE id=$id";
        return $this->connect->get($request);
    }

    public function getAll($table): bool|array
    {
        $sql = "SELECT * FROM $table";
        return $this->connect->get($sql);
    }

    public function insertIntoTable(array $data, string $table): bool
    {
        $preparedArray = $this->prepareValues($data);
        $column = $preparedArray ['title'];
        $value = $preparedArray ['values'];
        $request = "INSERT INTO $table ($column) VALUES ($value)";
        return $this->connect->send($request);
    }


    public function getValueByColumn(string $value, string $column): array
    {
        $request = "SELECT $this->table.$column FROM $this->table WHERE $column='$value'";
        return $this->connect->query($request);
    }






}