<?php

namespace NormApp\Shipping\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ShippingServiceInterface
{
    public function all(): Collection;
}
