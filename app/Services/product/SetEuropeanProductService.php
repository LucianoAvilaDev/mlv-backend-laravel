<?php

namespace App\Services\product;

use App\Models\EuropeanProduct;

class SetEuropeanProductService
{
    public static function run($product)
    {
        return new EuropeanProduct([
            'id' => $product['id'],
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price'],
            'has_discount' => $product['hasDiscount'],
            'discount_value' => $product['discountValue'],
            'adjective' => $product['details']['adjective'],
            'material' => $product['details']['material'],
            'provider' => 'eu',
            'gallery' => $product['gallery']
        ]);
    }
}
