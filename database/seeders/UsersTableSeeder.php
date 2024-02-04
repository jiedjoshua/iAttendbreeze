<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'firstname' => 'teacher',
            'lastname' => 'user',
            'email' => 'test1@test.com',
            'password' => Hash::make('hello123'),
            'role' => 'teacher',
            
        ]);

        DB::table('users')->insert([
            'firstname' => 'teacher',
            'lastname' => 'user',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            
        ]);
    }
}
