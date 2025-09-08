<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();
        
        $booking = DB::table('bookings')->first();
        $user = DB::table('users')->first();
        $vehicle = DB::table('vehicles')->first();

        DB::table('payments')->insert([
            [
                'payment_id' => Str::uuid(),
                'user_id' => $user->id,
                'vehicle_id' => $vehicle->vehicle_id,
                'booking_id' => $booking->booking_id,
                'amount' => 180.00,
                'method' => 'credit_card',
                'status' => 'completed',
                'payment_date' => now(),
                'transaction_id' => 'TXN' . Str::random(10),
                'metadata' => json_encode(['card_last4' => '1234']),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Enable foreign key checks
        Schema::enableForeignKeyConstraints();
    }
}