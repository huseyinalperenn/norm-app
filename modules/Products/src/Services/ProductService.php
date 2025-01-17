<?php

namespace NormApp\Products\Services;

use Illuminate\Database\Eloquent\Collection;
use NormApp\Products\Interfaces\ProductRepositoryInterface;
use NormApp\Products\Interfaces\ProductServiceInterface;

readonly class ProductService implements ProductServiceInterface
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    )
    {

    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->productRepository->get();
    }
}
