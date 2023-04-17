<?php

namespace App\Services\itemProducts;

use App\Models\BrazilianProduct;

class GetItemFromBrazilianProductService
{
    public static function run(BrazilianProduct $product)
    {
        $itemProduct = $product;
        $itemProduct['product_id'] = $product['id'];
        $itemProduct['has_discount'] = false;
        $itemProduct['discount_value'] = 0.0;
        $itemProduct['adjective'] = '';
        $itemProduct['gallery'] = [ $product['image'] ];
        $itemProduct['quantity'] = $itemProduct['quantity'] ?? 0;
        $itemProduct['total'] = $itemProduct['quantity'] * $itemProduct['price'];

        return $itemProduct;
    }
}


