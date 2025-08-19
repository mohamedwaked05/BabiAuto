<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            // In bookings migration:
            $table->uuid('booking_id')->primary();
            $table->foreignUuid('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('start_date'); // Booking start time
            $table->dateTime('end_date'); // Booking end time
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending'); // Booking status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
