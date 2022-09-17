<?php

namespace App\models;

use Framework\core\BaseModel;

class AccountActivation extends BaseModel
{
    public function activate(string $vkey): bool
    {
        $request = "UPDATE users SET verified = '1' WHERE (vkey = '$vkey')";
        return $this->connect->send($request);
    }
}
