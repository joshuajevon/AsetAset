<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'user',
            'nickname'=>'us',
            'email'=> 'user@gmail.com',
            'email_verified_at' => '2023-06-04 07:30:35',
            'password' =>bcrypt('user1234'),
            'phone_number'=> 123456789,
            'gender'=> 'Laki-laki',
            'isAdmin'=> false,
        ]);
    }
}
