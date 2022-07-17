<?php

namespace App\models;

class AccountActivation extends Account
{
    public function confirm(string $vkey): bool
    {
        $request = "UPDATE users SET `verified` = '1' WHERE (vkey = '$vkey')";
        return $this->connect->send($request);

    }
}