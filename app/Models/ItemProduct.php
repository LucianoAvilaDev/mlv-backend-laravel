<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'provider_product_id',
        'name',
        'description',
        'category',
        'image',
        'material',
        'department',
        'price',
        'quantity',
        'total',
        'provider'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }
}