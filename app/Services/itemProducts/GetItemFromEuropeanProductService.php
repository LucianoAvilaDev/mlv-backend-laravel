<?php

namespace App\Services\user;

use App\Models\EuropeanProduct;

class GetItemFromEuropeanProductService
{
    public static function run(EuropeanProduct $product, int $purchaseId)
    {
        $itemProduct = $product;
        $itemProduct['product_id'] = $product['id'];
        $itemProduct['purchase_id'] = $purchaseId;
        $itemProduct['category'] = '';
        $itemProduct['department'] = '';
        $itemProduct['total'] = $itemProduct['quantity'] * $itemProduct['price'];

        return $itemProduct;
    }
}


