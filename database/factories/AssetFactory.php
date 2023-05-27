<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_name = $this->faker->randomElement(['Rumah','Ruko','Gedung','Gudang','Apartemen','Tanah','Barang','Kendaraan','Alat berat','Lain-lain']);
        return [
            'name' => $this->faker->name(),
            'category' => $category_name,
            'province' => $this->faker->text(10),
            'city' => $this->faker->city(),
            'price' => $this->faker->numberBetween(123456789,20000000),
            'seller_id' => $this->faker->numberBetween(1,5),
            'owner_id' => $this->faker->numberBetween(1,5),
            'description' => $this->faker->text(50),
            'status' => 'dijamin oleh bank a',
            'attachment' => 'asset.png',
            'image' => 'asset.png'
        ];
    }
}
