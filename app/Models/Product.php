<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image_url',
        'rating',
        'stock',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'rating' => 'decimal:1',
            'stock' => 'integer',
        ];
    }
}
