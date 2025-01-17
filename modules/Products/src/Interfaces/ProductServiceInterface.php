<?php

namespace NormApp\Products\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ProductServiceInterface
{
    public function get(): Collection;
}
