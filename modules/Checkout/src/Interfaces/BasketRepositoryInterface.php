<?php

namespace NormApp\Checkout\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use NormApp\Checkout\Models\Basket;

interface BasketRepositoryInterface
{
    public function findProductByUser(int $productId, int $userId): ?Basket;

    public function getByUserId(int $userId): Collection;

    public function store(array $data): Basket;

    public function updateQtyById(int $id, int $qty): int;

    public function deleteById(int $id): mixed;

    public function deleteAllByUserId(int $userId): mixed;
}
