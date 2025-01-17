<?php

namespace NormApp\Shipping\Models;

use Database\Factories\ShippingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount'
    ];

    protected static function newFactory(): ShippingFactory
    {
        return ShippingFactory::new();
    }
}
