<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Admin User',
                'email' => 'admin@babiauto.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'phone' => '123-456-7890',
                'address' => '123 Admin Street, City, State',
                'driver_license' => 'DL123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Test Customer',
                'email' => 'customer@babiauto.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'phone' => '098-765-4321',
                'address' => '456 Customer Ave, Town, State',
                'driver_license' => 'DL987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}