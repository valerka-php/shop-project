<?php

namespace Framework\core;

use JetBrains\PhpStorm\ArrayShape;
use Framework\core\Db;

class BaseModel
{
    public object $connect;

    public function __construct()
    {
        $db = new Db();
        $this->connect = $db->getInstance();
    }
    /**
     * @param array $array Data which you need insert into the table
     * @return array Returns array strings prepared to sql request  (array[title] = title column , array[values] = value row)
     ** example "INSERT id,name,surname INTO "yourTable" VALUES  (1,Valerii,Nyzhnui);
     */
    #[ArrayShape(['title' => "string", 'values' => "string"])]
    public function prepareValues(array $array): array
    {
        $column = '';
        $value = '';
        foreach ($array as $k => $v) {
            $column .= "`" . $k . "`,";
            $value .= "'" . $v . "',";
        }
        $preparedColumn = substr($column, 0, -1);
        $preparedValues = substr($value, 0, -1);

        return [
            'title' => $preparedColumn,
            'values' => $preparedValues
        ];
    }

    public function getOneById(string $table, int $id): array
    {
        $request = "SELECT * FROM $table WHERE id=$id";
        return $this->connect->get($request);
    }

    public function getOneWhere(string $column,string $where,string $table): array | bool
    {
        $request = "SELECT * FROM $table WHERE $column = '$where'";
        return $this->connect->get($request);
    }

    public function getAll($table,$title = '*'): bool|array
    {
        $sql = "SELECT $title FROM $table";
        return $this->connect->get($sql);
    }

    /**
     * @param array $data Array with data which you insert into table ( key = title column , value = data value)
     * @param string $table
     * @return bool
     */
    public function insertIntoTable(array $data, string $table): bool
    {
        $preparedArray = $this->prepareValues($data);
        $column = $preparedArray ['title'];
        $value = $preparedArray ['values'];
        $request = "INSERT INTO $table ($column) VALUES ($value)";
        return $this->connect->send($request);
    }

    public function insertOne(string $column,string $value,string $table)
    {
        $sql = "INSERT INTO $table ($column) VALUES ($value)";
        return $this->connect->send($sql);
    }

    public function insertOneWhere(string $column, string $value, string $table, string $where)
    {
        $sql = "INSERT INTO $table ($column) VALUES ($value) = $where";
        return $this->connect->send($sql);
    }


}