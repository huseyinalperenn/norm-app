<?php

namespace NormApp\Shipping\Services;

use Illuminate\Database\Eloquent\Collection;
use NormApp\Shipping\Interfaces\ShippingRepositoryInterface;
use NormApp\Shipping\Interfaces\ShippingServiceInterface;

readonly class ShippingService implements ShippingServiceInterface
{
    public function __construct(
        public ShippingRepositoryInterface $shippingRepository
    )
    {
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->shippingRepository->all();
    }
}
