<?php

namespace App\Interfaces;

use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Collection;

interface UserAddressServiceInterface
{
    public function getByUserId(int $userId): Collection;

    public function store(array $data): UserAddress;

}
