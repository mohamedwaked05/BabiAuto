<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 booking records with 'pending' status
        Booking::factory(10)->create([
            'status' => 'pending',
        ]);
    }
}
