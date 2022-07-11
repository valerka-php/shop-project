<?php

namespace App\models;

use Framework\core\BaseModel;

class User extends BaseModel
{
    public function insertUserIntoTable($values = []): array
    {
        $column = '';
        $data = '';
        if (!empty($values)) {
            foreach ($values as $key => $value) {
                $column .= "`" . $key . "`,";
                $data .= "'" . $value . "',";
            }
        }
        $preparedColumn = substr($column, 0, -1);
        $preparedData = substr($data, 0, -1);

        $request = "INSERT INTO users ($preparedColumn) VALUES ($preparedData)";
        return $this->pdo->query($request);
    }

    public function checkUser($user): bool
    {
        $request = "SELECT `login` FROM {$this->table} WHERE login='$user'";
        $response = $this->pdo->query($request);

        if (!empty($response)) {
            return true;
        } else {
            return false;
        }
    }
}