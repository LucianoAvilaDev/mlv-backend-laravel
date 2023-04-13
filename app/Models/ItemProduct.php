<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'image',
        'price',
        'material',
        'department'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }
}