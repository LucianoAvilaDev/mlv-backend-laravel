<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class EuropeanProduct extends Product
{
    use HasFactory;

    protected $fillable = [
        'gallery',
        'has_discount',
        'discount_value',
        'adjective',
    ];

    public function __construct(array $atributes)
    {
        $this->has_discount = $atributes['has_discount'];
        $this->discount_value = $atributes['discount_value'];
        $this->gallery = $atributes['gallery'];
        $this->adjective = $atributes['adjective'];

        parent::__construct($atributes);
    }
}