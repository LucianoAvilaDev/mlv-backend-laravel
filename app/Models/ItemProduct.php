<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'name',
        'description',
        'price',
        'material',
        'provider',
        'category',
        'department',
        'gallery',
        'has_discount',
        'discount_value',
        'adjective',
        'quantity',
        'total',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }

}
