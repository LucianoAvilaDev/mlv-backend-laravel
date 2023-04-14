<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrazilianProduct extends Product
{
    use HasFactory;

    protected $fillable = [
        'category',
        'department',
        'image',
    ];

    public function __construct(array $atributes)
    {
        $this->category = $atributes['category'];
        $this->department = $atributes['department'];
        $this->image = $atributes['image'];

        parent::__construct($atributes);
    }
}