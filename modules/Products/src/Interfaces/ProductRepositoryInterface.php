<?php

namespace NormApp\Products\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function get(): Collection;
}
