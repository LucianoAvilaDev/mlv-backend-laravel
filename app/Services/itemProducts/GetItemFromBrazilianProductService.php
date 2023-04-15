<?php

namespace App\Services\user;

use App\Models\BrazilianProduct;

class GetItemFromBrazilianProductService
{
    public static function run(BrazilianProduct $product, int $purchaseId)
    {
        $itemProduct = $product;
        $itemProduct['product_id'] = $product['id'];
        $itemProduct['purchase_id'] = $purchaseId;
        $itemProduct['has_discount'] = false;
        $itemProduct['discount_value'] = 0.0;
        $itemProduct['adjective'] = '';
        $itemProduct['gallery'] = [ $product['image'] ];
        $itemProduct['total'] = $itemProduct['quantity'] * $itemProduct['price'];

        return $itemProduct;
    }
}


