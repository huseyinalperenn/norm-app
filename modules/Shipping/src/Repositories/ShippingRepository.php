<?php

namespace NormApp\Shipping\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use NormApp\Shipping\Interfaces\ShippingRepositoryInterface;
use NormApp\Shipping\Models\Shipping;

class ShippingRepository implements ShippingRepositoryInterface
{
    protected Builder $builder;

    public function __construct(Shipping $shipping)
    {
        $this->builder = $shipping->newQuery();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->builder->get();
    }
}
