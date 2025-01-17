<?php

namespace NormApp\Shipping\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ShippingRepositoryInterface
{
    public function all(): Collection;
}
