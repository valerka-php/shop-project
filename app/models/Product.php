<?php

namespace App\models;

use Framework\core\BaseModel;

class Product extends BaseModel
{
    public function addProduct(array $list)
    {
        $typeTable = $this->getAll('type_product');

        foreach ($list as $type => $products) {
            $typeId = '';
            for ($i = 0; $i < count($typeTable); $i++) {
                if (in_array($type, $typeTable[$i])) {
                    $typeId = $typeTable[$i]['type_id'];
                }
            }

            for ($i = 0; $i < count($products); $i++) {
                $this->insertOne("`title`,`description`", "'{$products[$i]['name']}','{$products[$i]['description']}'", 'product');
                $this->insertOne("count", "{$products[$i]['count']}", 'count_product');
                $this->insertOne("price", "{$products[$i]['price']}", 'price_product');
                $this->insertOne("type_id", "$typeId", 'product_has_type');
            }
        }
    }


}