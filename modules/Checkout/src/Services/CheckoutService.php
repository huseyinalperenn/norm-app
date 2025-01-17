<?php

namespace NormApp\Checkout\Services;

use NormApp\Checkout\Interfaces\CheckoutRepositoryInterface;
use NormApp\Checkout\Interfaces\CheckoutServiceInterface;
use NormApp\Checkout\Models\Checkout;

readonly class CheckoutService implements CheckoutServiceInterface
{
    public function __construct(
        public CheckoutRepositoryInterface $checkoutRepository
    )
    {
    }

    /**
     * @param int $id
     * @return ?Checkout
     */
    public function getById(int $id): ?Checkout
    {
        return $this->checkoutRepository->getById($id);
    }

    /**
     * @param array $data
     * @return Checkout
     */
    public function store(array $data): Checkout
    {
        return $this->checkoutRepository->store($data);
    }
}
