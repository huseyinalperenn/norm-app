<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use NormApp\Shipping\Models\Shipping;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShippingFactory extends Factory
{
    protected $model = Shipping::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Aras Kargo', 'Yurtiçi Kargo', 'Mng Kargo', 'Ptt Kargo', 'Sürat Kargo']),
            'amount' => $this->faker->randomFloat(1, 1, 50)
        ];
    }
}
