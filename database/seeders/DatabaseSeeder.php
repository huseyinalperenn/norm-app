<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use NormApp\Products\Models\Product;
use NormApp\Shipping\Models\Shipping;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(10)->create();
        Shipping::factory(2)->create();
    }
}
