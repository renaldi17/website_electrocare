<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin', 
                'username'=> 'admin',
                'email' => 'admin@gmail.com', 
                'password' => bcrypt('12345678'),
                'phone_number' => '089610001155',
                'role' => 'admin', 
                'created_at' => now(),
                'updated_at' => now(), 
            ],
        ]);
    }
}
