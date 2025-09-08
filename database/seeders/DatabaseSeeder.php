<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();

        // Truncate all tables first
        DB::table('users')->truncate();
        DB::table('vehicles')->truncate();
        DB::table('bookings')->truncate();
        DB::table('payments')->truncate();
        DB::table('maintenances')->truncate();

        // Enable foreign key checks
        Schema::enableForeignKeyConstraints();

        // Run seeders in correct order
        $this->call([
            UserSeeder::class,
            VehicleSeeder::class,
            BookingSeeder::class,
            PaymentSeeder::class,
            MaintenanceSeeder::class,
        ]);
    }
}
