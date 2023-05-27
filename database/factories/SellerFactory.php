<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seller_name' => $this->faker->name(),
            'seller_address' => $this->faker->text(10),
            'seller_phone' => $this->faker->numberBetween(123456789,20000000)
        ];
    }
}
