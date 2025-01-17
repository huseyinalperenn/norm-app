<?php

namespace NormApp\Checkout\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use NormApp\Checkout\Interfaces\BasketRepositoryInterface;
use NormApp\Checkout\Models\Basket;

class BasketRepository implements BasketRepositoryInterface
{
    /**
     * @var Builder
     */
    protected Builder $builder;

    /**
     * @param Basket $basket
     */
    public function __construct(Basket $basket)
    {
        $this->builder = $basket->newQuery();
    }

    /**
     * @param int $productId
     * @param int $userId
     * @return ?Basket
     */
    public function findProductByUser(int $productId, int $userId): ?Basket
    {
        return $this->builder->where([
            "product_id" => $productId,
            "user_id" => $userId
        ])->first();
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function getByUserId(int $userId): Collection
    {
        return $this->builder->with('product')->where("user_id", $userId)->get();
    }

    /**
     * @param array $data
     * @return Basket
     */
    public function store(array $data): Basket
    {
        return $this->builder->create($data);
    }

    /**
     * @param int $id
     * @param int $qty
     * @return int
     */
    public function updateQtyById(int $id, int $qty): int
    {
        return $this->builder->where('id', $id)->update([
            "qty" => $qty
        ]);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteById(int $id): mixed
    {
        return $this->builder->where('id', $id)->delete();
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function deleteAllByUserId(int $userId): mixed
    {
        return $this->builder->where('user_id', $userId)->delete();
    }
}
