<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class VehicleSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();
        
        DB::table('vehicles')->insert([
            [
                'vehicle_id' => Str::uuid(),
                'name' => 'Toyota Camry',
                'model' => 'Camry',
                'license_plate' => 'ABC123',
                'color' => 'Red',
                'status' => 'available',
                'type' => 'Sedan',
                'features' => json_encode(['AC', 'Bluetooth', 'GPS']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vehicle_id' => Str::uuid(),
                'name' => 'Honda Civic',
                'model' => 'Civic',
                'license_plate' => 'XYZ789',
                'color' => 'Blue',
                'status' => 'available',
                'type' => 'Sedan',
                'features' => json_encode(['AC', 'Sunroof', 'Backup Camera']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vehicle_id' => Str::uuid(),
                'name' => 'Ford Explorer',
                'model' => 'Explorer',
                'license_plate' => 'DEF456',
                'color' => 'Black',
                'status' => 'maintenance',
                'type' => 'SUV',
                'features' => json_encode(['4WD', 'Leather Seats', 'Navigation']),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Enable foreign key checks
        Schema::enableForeignKeyConstraints();
    }
}