<?php

namespace NormApp\Checkout\Repositories;

use Illuminate\Database\Eloquent\Builder;
use NormApp\Checkout\Interfaces\CheckoutRepositoryInterface;
use NormApp\Checkout\Models\Checkout;

class CheckoutRepository implements CheckoutRepositoryInterface
{
    protected Builder $builder;

    public function __construct(Checkout $checkout)
    {
        $this->builder = $checkout->newQuery();
    }

    /**
     * @param int $id
     * @return ?Checkout
     */
    public function getById(int $id): ?Checkout
    {
        return $this->builder->where('id', $id)->first();
    }

    /**
     * @param array $data
     * @return Checkout
     */
    public function store(array $data): Checkout
    {
        return $this->builder->create($data);
    }
}
