<?php

namespace NormApp\Checkout\Models;

use Illuminate\Database\Eloquent\Model;
use NormApp\Products\Models\Product;

class Basket extends Model
{
    protected $fillable = [
        "user_id",
        "product_id",
        "qty"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
