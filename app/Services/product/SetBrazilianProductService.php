<?php

namespace App\Services\product;

use App\Models\BrazilianProduct;

class SetBrazilianProductService
{
    public static function run($product)
    {
        return new BrazilianProduct([
            'id' => $product['id'],
            'name' => $product['nome'],
            'description' => $product['descricao'],
            'price' => $product['preco'],
            'material' => $product['material'],
            'category' => $product['categoria'],
            'department' => $product['departamento'],
            'provider' => 'br',
            'image' => $product['imagem']
        ]);
    }
}