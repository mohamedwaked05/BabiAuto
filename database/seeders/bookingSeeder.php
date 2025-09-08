<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class BookingSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();
        
        $users = DB::table('users')->take(2)->get();
        $vehicles = DB::table('vehicles')->take(2)->get();

        DB::table('bookings')->insert([
            [
                'booking_id' => Str::uuid(),
                'user_id' => $users[0]->id,
                'vehicle_id' => $vehicles[0]->vehicle_id,
                'start_date' => now()->addDays(1),
                'end_date' => now()->addDays(5),
                'status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => Str::uuid(),
                'user_id' => $users[1]->id,
                'vehicle_id' => $vehicles[1]->vehicle_id,
                'start_date' => now()->addDays(2),
                'end_date' => now()->addDays(3),
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Enable foreign key checks
        Schema::enableForeignKeyConstraints();
    }
}
