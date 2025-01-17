<?php

namespace NormApp\Products\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use NormApp\Products\Models\Product;
use NormApp\Products\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected Builder $builder;

    public function __construct(Product $product)
    {
        $this->builder = $product->newQuery();
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->builder->get();
    }
}
