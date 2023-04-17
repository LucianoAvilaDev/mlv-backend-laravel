<?php

namespace App\Http\Controllers;

use App\Services\product\SetBrazilianProductService;
use App\Services\product\SetEuropeanProductService;
use App\Services\itemProducts\GetItemFromBrazilianProductService;
use App\Services\itemProducts\GetItemFromEuropeanProductService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $brazilianProviderProducts = Http::get(env('API_BRAZILIAN_PROVIDER'))->json();
        $europeanProviderProducts = Http::get(env('API_EUROPEAN_PROVIDER'))->json();

        $brProducts = Arr::map($brazilianProviderProducts, function ($product) {
            return GetItemFromBrazilianProductService::run(SetBrazilianProductService::run($product));
        });

        $euProducts = Arr::map($europeanProviderProducts, function ($product) {
            return GetItemFromEuropeanProductService::run(SetEuropeanProductService::run($product));

        });

        $allProducts = array_merge($brProducts, $euProducts);

        return response()->json($allProducts, 200);
    }

    public function getOneProduct(string $id, string $provider)
    {
        switch ($provider) {
            case "br": {
                    $responseProduct = Http::get(env('API_BRAZILIAN_PROVIDER') . '/' . $id)->json();
                    $product = GetItemFromBrazilianProductService::run(SetBrazilianProductService::run($responseProduct));
                    return response()->json($product, 200);
                }
            case "eu": {
                    $responseProduct = Http::get(env('API_EUROPEAN_PROVIDER') . '/' . $id)->json();
                    $product = GetItemFromEuropeanProductService::run(SetEuropeanProductService::run($responseProduct));
                    return response()->json($product, 200);
                }
            default:
                return response()->json("Parâmetros incorretos", 400);
        }
    }
}
