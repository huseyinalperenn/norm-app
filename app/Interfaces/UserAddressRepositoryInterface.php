<?php

namespace App\Interfaces;

use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Collection;

interface UserAddressRepositoryInterface
{
    public function getByUserId(int $userId): Collection;

    public function store(array $data): UserAddress;

    public function updateById(int $id, array $data): int;

    public function deleteById(int $id): mixed;
}
