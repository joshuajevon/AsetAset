<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'nickname'=>'ad',
            'email'=> 'admin@asetaset.com',
            'email_verified_at' => '2023-06-04 07:30:35',
            'password' =>bcrypt('@AdminAsetAset123'),
            'phone_number'=> 123456789,
            'gender'=> 'Laki-laki',
            'isAdmin'=> true,
        ]);
    }
}
