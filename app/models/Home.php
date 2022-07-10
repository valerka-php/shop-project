<?php

namespace App\models;

use Framework\core\BaseModel;


class Home extends BaseModel
{
    public function insertIntoTable($table, $values = [])
    {
        $column = '';
        $data = '';
        if (!empty($values)) {
            foreach ($values as $key => $value) {
                $column .= "`" . $key . "`, ";
                $data .= '`' . $value . '`, ';
            }
        }

        $preparedColumn = substr($column, 0, -2);
        $preparedData = substr($data, 0, -2);

        var_dump($preparedColumn);
        var_dump($preparedData);


        $response = "INSERT INTO `$table` ($preparedColumn) VALUES ($preparedData)";
        return $this->pdo->query($response);
    }
}