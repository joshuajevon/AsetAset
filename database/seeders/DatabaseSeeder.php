<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Owner::factory(5)->create();
        \App\Models\Seller::factory(5)->create();
        \App\Models\Asset::factory(20)->create();

        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
        ]);
    }
}
