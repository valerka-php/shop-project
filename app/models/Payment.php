<?php

namespace App\models;

use Framework\core\BaseModel;

class Payment extends BaseModel
{
    public function updateProductsQuantity(int $id, int $stock)
    {
        $sql = "UPDATE count_product SET `count` = $stock WHERE (`count_id` = $id)";

        return $this->connect->send($sql);
    }

    public function createInvoice(array $cart, int $totalPrice): string
    {
        $txt = '';

        foreach ($cart as $item) {
            $stock = $item['totalCount'] - $item['itemsInCart'];
            $id = $item['id'];
            $this->updateProductsQuantity($id, $stock);

            $text =
                '<tr style="text-align:center;color: #000000;border: 4px solid black">
                        <th>' . $item['title'] . '</th>
                        <th>' . $item['price'] . '</th>
                        <th>' . $item['itemsInCart'] . '</th>
                </tr>';
            $txt .= $text;
        }

        $tableHeader = require '../app/config/mailHeaderItems.php';
        $table = '<table style="border: 2px solid black;background-color: #accaef">' . $tableHeader . $txt
            . '<th></th><th> total price ' . $totalPrice
            . '</th></table>';

        return $table;
    }
}
