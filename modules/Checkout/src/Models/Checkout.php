<?php

namespace NormApp\Checkout\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
        'user_id',
        'order_number'
    ];
}
