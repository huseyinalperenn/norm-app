<?php

namespace NormApp\Checkout\Services;

use Illuminate\Database\Eloquent\Collection;
use NormApp\Checkout\Interfaces\BasketRepositoryInterface;
use NormApp\Checkout\Interfaces\BasketServiceInterface;
use NormApp\Checkout\Models\Basket;

/**
 *
 */
readonly class BasketService implements BasketServiceInterface
{
    /**
     * @param BasketRepositoryInterface $basket
     */
    public function __construct(
        public readonly BasketRepositoryInterface $basket
    )
    {
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function getByUserId(int $userId): Collection
    {
        return $this->basket->getByUserId($userId);
    }

    /**
     * @param array $data
     * @return Basket
     */
    public function store(array $data): Basket
    {
        $basketProduct = $this->basket->findProductByUser($data["product_id"], $data["user_id"]);
        if (!empty($basketProduct)) {
            $this->updateQtyById($basketProduct->id, $basketProduct->qty++);
            return $basketProduct;
        }
        return $this->basket->store($data);
    }

    /**
     * @param int $id
     * @param int $qty
     * @return int
     */
    public function updateQtyById(int $id, int $qty): int
    {
        return $this->basket->updateQtyById($id, $qty);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteById(int $id): mixed
    {
        return $this->basket->deleteById($id);
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function deleteAllByUserId(int $userId): mixed
    {
        return $this->basket->deleteAllByUserId($userId);
    }
}
