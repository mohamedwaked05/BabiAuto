<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaintenanceSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();
        
        $vehicle = DB::table('vehicles')->where('status', 'maintenance')->first();
        $user = DB::table('users')->first();

        DB::table('maintenances')->insert([
            [
                'maintenance_id' => Str::uuid(),
                'vehicle_id' => $vehicle->vehicle_id,
                'user_id' => $user->id,
                'service_date' => now(),
                'cost' => 120.00,
                'description' => 'Oil change and tire rotation',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Enable foreign key checks
        Schema::enableForeignKeyConstraints();
    }
}