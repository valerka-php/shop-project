<?php

namespace App\models;

use Framework\core\BaseModel;

class Product extends BaseModel
{
    public function addProducts(array $list)
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
                $this->insertOne("image", "'{$products[$i]['img']}'", 'image_product');
                $this->insertOne("count", "{$products[$i]['count']}", 'count_product');
                $this->insertOne("price", "{$products[$i]['price']}", 'price_product');
                $this->insertOne("type_id", "$typeId", 'product_has_type');

            }
        }
    }

    public function getProducts(string $type)
    {
        $sql = "
            SELECT product.title,image_product.image,product.description,type_product.type,price_product.price,count_product.count
            FROM product_has_type  
            INNER JOIN product ON product_has_type.product_id = product.id
            INNER JOIN type_product ON product_has_type.type_id = type_product.type_id
            INNER JOIN price_product ON product.id = price_product.price_id
            INNER JOIN image_product ON product.id = image_product.id
            INNER JOIN count_product ON product.id = count_product.count_id WHERE type = '$type'
           ";

        return $this->connect->get($sql);
    }


}