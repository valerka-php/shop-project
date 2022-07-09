<?php

namespace App\models;

use Framework\core\AbstractModel;


class Home extends AbstractModel
{
    public function getOne()
    {
        $query = "SELECT * FROM books WHERE id=1";
        return $this->select($query);
    }
}