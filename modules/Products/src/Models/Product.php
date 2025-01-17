<?php

namespace NormApp\Products\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "name",
        "price"
    ];

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }
}
