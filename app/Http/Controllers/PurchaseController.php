<?php

namespace App\Http\Controllers;

use App\Http\Requests\purchase\StorePurchaseRequest;
use App\Models\Purchase;
use App\Services\purchase\StorePurchaseService;

class PurchaseController extends Controller
{
    public function store(StorePurchaseRequest $request)
    {
        $validatedPurchase = $request->validated();

        $newPurchase = StorePurchaseService::run($validatedPurchase);

        return response()->json($newPurchase, 201);
    }

    public function show(string $id)
    {
        $purchase = Purchase::with('client', 'products')->find($id);

        return response()->json($purchase);
    }

    public function update(StorePurchaseRequest $request, Purchase $purchase)
    {
        $validatedPurchase = $request->validated();

        $updatedPurchase = $purchase->update($validatedPurchase);

        return response()->json($updatedPurchase, 200);
    }

    public function destroy(Purchase $purchase)
    {
        if ($purchase->delete()) {
            return response()->json('', 204);
        }
        return response()->json('Não foi possível excluir a Compra', 400);
    }
}
