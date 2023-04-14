<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $brazilianProviderProducts = Http::get(env('API_BRAZILIAN_PROVIDER'));
        $europeanProviderProducts = Http::get(env('API_EUROPEAN_PROVIDER'));

        $allProducts = [];

        foreach ($brazilianProviderProducts as $brProduct) {
            $brProduct['provider'] = 'brazilian_provider';
            array_push($allProducts, $brProduct);
        }

        foreach ($europeanProviderProducts as $euProduct) {
            $euProduct['provider'] = 'european_provider';
            array_push($allProducts, $euProduct);
        }

        return response()->json($allProducts, 200);
    }

    public function getOneProduct(string $id, string $provider)
    {
        switch($provider){
            case "br": {
                $product = Http::get(env('API_BRAZILIAN_PROVIDER'.'/'.$id));
                $product['provider'] = 'brazilian_provider';
                return response()->json($product, 200);
            }
            case "eu": {
                $product = Http::get(env('API_EUROPEAN_PROVIDER'.'/'.$id));
                $product['provider'] = 'european_provider';
                return response()->json($product, 200);
            }
            default:
                return response()->json("Parâmetros incorretos", 400);
        }
    }
}
