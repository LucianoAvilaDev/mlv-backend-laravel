<?php

namespace App\Services\itemProducts;

use App\Models\EuropeanProduct;

class GetItemFromEuropeanProductService
{
    public static function run(EuropeanProduct $product)
    {
        $itemProduct = $product;
        $itemProduct['product_id'] = $product['id'];
        $itemProduct['category'] = '';
        $itemProduct['department'] = '';
        $itemProduct['quantity'] = $itemProduct['quantity'] ?? 0;
        $itemProduct['total'] = $itemProduct['quantity'] * $itemProduct['price'];

        return $itemProduct;
    }
}


