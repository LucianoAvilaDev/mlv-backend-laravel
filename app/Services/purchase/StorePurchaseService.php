<?php

namespace App\Services\purchase;

use App\Http\Requests\purchase\StorePurchaseRequest;
use App\Models\Purchase;
use App\Services\itemProducts\StoreItemProductsService;
use Error;
use Illuminate\Support\Facades\DB;

class StorePurchaseService
{
    public static function run(StorePurchaseRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedPurchase = $request->validated();

            $newPurchase = Purchase::create($validatedPurchase->toArray());

            StoreItemProductsService::run($validatedPurchase['products'], $newPurchase['id']);

            DB::commit();

            return $newPurchase;

        } catch (\Exception $e) {
            DB::rollback();

            throw new Error("Erro ao cadastrar Compra");
        }
    }
}
