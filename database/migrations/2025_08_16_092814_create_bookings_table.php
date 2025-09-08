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
        $table->uuid('booking_id')->primary();
        $table->uuid('vehicle_id'); // Remove constrained() here
        $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
        $table->dateTime('start_date');
        $table->dateTime('end_date');
        $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
        $table->timestamps();

        // Add explicit foreign key constraint
        $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicles')->onDelete('cascade');
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
