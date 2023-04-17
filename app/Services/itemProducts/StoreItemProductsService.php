<?php

namespace App\Services\itemProducts;

use App\Models\ItemProduct;
use App\Services\itemProducts\GetItemFromBrazilianProductService;
use App\Services\itemProducts\GetItemFromEuropeanProductService;
use Error;
use Illuminate\Support\Facades\DB;

class StoreItemProductsService
{
    public static function run(mixed $products, int $purchaseId)
    {
        try {
            DB::beginTransaction();

            foreach ($products as $product) {
                switch($product['provider']){
                    case 'br': {
                        $newItem = GetItemFromBrazilianProductService::run($product);
                        $newItem['purchase_id'] = $purchaseId;
                        ItemProduct::create($newItem);
                    }
                    case 'eu': {
                        $newItem = GetItemFromEuropeanProductService::run($product, $purchaseId);
                        $newItem['purchase_id'] = $purchaseId;
                        ItemProduct::create($newItem);
                    }
                }
            };

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();

            throw new Error("Erro ao cadastrar Compra");
        }
    }
}
