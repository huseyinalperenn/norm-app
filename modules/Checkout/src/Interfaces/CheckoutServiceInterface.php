<?php

namespace NormApp\Checkout\Interfaces;

use NormApp\Checkout\Models\Checkout;

interface CheckoutServiceInterface
{
    public function getById(int $id): ?Checkout;

    public function store(array $data): Checkout;
}
