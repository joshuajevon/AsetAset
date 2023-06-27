<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_name = $this->faker->randomElement([
            "PKPU","Pailit","Others"
        ]);

        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(10),
            'date' => $this->faker->date(),
            'file' => 'a-wallpaper.jpg',
            'type' => $category_name
        ];
    }
}
