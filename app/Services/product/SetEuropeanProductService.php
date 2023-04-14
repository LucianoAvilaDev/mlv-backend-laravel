<?php

namespace App\Services\product;

use App\Models\EuropeanProduct;
use Illuminate\Support\Arr;

class SetEuropeanProductService
{
    public static function run($product)
    {
        $galleryFormated = Arr::map($product['gallery'], function ($image) {
            return str_replace(`"a"`, '/', $image);
        });

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
            'gallery' => $galleryFormated
        ]);
    }
}