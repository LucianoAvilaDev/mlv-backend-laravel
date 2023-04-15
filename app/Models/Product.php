<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'description',
        'price',
        'material',
        'provider'
    ];

    public function __construct(array $atributes)
    {
        $this->id = $atributes['id'];
        $this->name = $atributes['name'];
        $this->description = $atributes['description'];
        $this->price = $atributes['price'];
        $this->material = $atributes['material'];
        $this->provider = $atributes['provider'];
    }
}
