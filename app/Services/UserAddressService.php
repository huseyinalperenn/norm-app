<?php

namespace App\Services;

use App\Interfaces\UserAddressRepositoryInterface;
use App\Interfaces\UserAddressServiceInterface;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Collection;

readonly class UserAddressService implements UserAddressServiceInterface
{
    public function __construct(
        public readonly UserAddressRepositoryInterface $userAddressRepository
    )
    {
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function getByUserId(int $userId): Collection
    {
        return $this->userAddressRepository->getByUserId($userId);
    }

    /**
     * @param array $data
     * @return UserAddress
     */
    public function store(array $data): UserAddress
    {
        return $this->userAddressRepository->store($data);
    }
}
