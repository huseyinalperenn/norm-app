<?php

namespace App\Repositories;

use App\Interfaces\UserAddressRepositoryInterface;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserAddressRepository implements UserAddressRepositoryInterface
{
    protected Builder $builder;

    public function __construct(UserAddress $userAddress)
    {
        $this->builder = $userAddress->newQuery();
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function getByUserId(int $userId): Collection
    {
        return $this->builder->where('user_id', $userId)->get();
    }

    /**
     * @param array $data
     * @return UserAddress
     */
    public function store(array $data): UserAddress
    {
        return $this->builder->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return int
     */
    public function updateById(int $id, array $data): int
    {
        return $this->builder->where('id', $id)->update($data);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteById(int $id): mixed
    {
        return $this->builder->where('id', $id)->delete();
    }
}
